<?php

//

class Tinder {

    private $viewed;
    private $matches;
    private $liked;
    private $session;
    private $repo;
    private $user;

    public function __construct(UserRepository $repo, Session $session) {

        $this->repo = $repo;
        $this->session = $session;
        $this->user = $session->getCurrentUser();

        if ($this->user) {
            $data = $this->user->getData();
            $this->viewed = $data['viewed'] ?? [];
            $this->liked = $data['liked'] ?? [];
        }
        $this->matches = [];
    }

    public function userViewNext() {
        foreach ($this->repo->loadAll() as $user) {
            if ($this->user->getDataItem('gender') != $user->getDataItem('gender')) {
                if ($this->user->getEmail() != $user->getEmail()) {
                    if (!in_array($user->getEmail(), $this->viewed)) {
                        $this->viewed[] = $user->getEmail();
                        return $user;
                    }
                }
            }
        }
    }

    public function userViewLast() {
        if (empty($this->viewed)) {
            return $this->userViewNext();
        } else {
            $email = end($this->viewed);
            return $this->repo->load($email);
        }
    }

    public function userLike() {
        $user = $this->userViewLast();
        $temp = $user->getEmail();
        $this->liked[$temp] = $temp;
    }

    public function getMatches() {
        foreach ($this->liked as $useremail) {
            $thisuser = $this->repo->load($useremail);
            $thisuserlikes = $thisuser->getDataItem('liked') ?? [];
            if (in_array($this->user->getEmail(), $thisuserlikes)) {
                $this->matches[] = $thisuser;
            }
        }
        return $this->matches;
    }

    public function dataLoad() {
        $data = $this->repo->load();
        if ($data) {
            $this->viewed = $data['viewed'] ?? [];
            $this->matches = $data['matches'] ?? [];
        }
    }

//Save data to text file
    public function dataSave() {
        $this->user->setDataItem('viewed', $this->viewed);
        $this->user->setDataItem('liked', $this->liked);
        $this->repo->save($this->user);
    }

    public function dataClear() {
        return $this->repo->delete();
    }

}
?>

