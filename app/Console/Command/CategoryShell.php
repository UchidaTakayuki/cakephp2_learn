<?php
class CategoryShell extends AppShell {
    public $uses = ['Category'];

    public function main() {
        return $this->out($this->OptionParser->help());
    }

    public function index() {
        $this->out("id\tname");
        foreach ($this->Category->find('all') as $category) {
            $this->out($category['Category']['id']
                ."\t".$category['Category']['name']);
        }
    }

    public function add() {
        $this->Category->create();
        $this->Category->save(['name' => $this->args[0]]);
        $this->out('created');
    }

    public function delete() {
        $category = $this->Category->findById($this->args[0]);
        $this->out($category['Category']['name']
            ."\t".$category['Category']['name']);
        if (strtolower($this->in('Are you sure you want to delete it?', ['y', 'n']) == 'n')) {
            $this->out('exit');
            return;
        }
        $this->Category->delete($this->args[0]);
        $this->out('complate delete!');
    }
}