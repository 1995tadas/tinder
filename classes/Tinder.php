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
        var_dump($this->user);
        $this->matches = [];
    }

    public function userViewNext() {
        foreach ($this->repo->loadAllUsers() as $user) {
            if (!in_array($user->getEmail(), $this->viewed)) {
                $this->viewed[] = $user;
                return $user;
            }
        }
    }

    public function userViewLast() {
        if (empty($this->viewed)) {
            return $this->userViewNext();
        } else {
            return end($this->viewed);
        }
    }

    public function userLike() {
        $user = $this->userViewLast();
        if ($user->tryMatch()) {
            $this->matches[] = $user;
        }
    }

    public function getMatches() {
        return $this->matches;
    }

    public function dataLoad() {
        $data = $this->repo->load();
        if ($data) {
            var_dump($data);
            $this->viewed = $data['viewed'] ?? [];
            $this->matches = $data['matches'] ?? [];
        }
    }

//Save data to text file
    public function dataSave() {
        $this->user->setDataItem('viewed', $this->viewed);
        $this->repo->save($this->user);
    }

    public function dataClear() {
        return $this->repo->delete();
    }

}
?>

