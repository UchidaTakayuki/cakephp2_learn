<?php
class TasksController extends AppController {
    public $scaffold;

    public function index() {
        $options = array(
            'conditions' => array(
                'Task.status' => 0
            )
        );
        $tasks_data = $this->Task->find('all', $options);
        $this->set('tasks_data', $tasks_data);
        $this->render('index');
    }

    public function done() {
        $id = $this->request->pass[0];
        $this->Task->id = $id;
        $this->Task->saveField('status', 1);

        $msg = sprintf('complete %s task!', $id);
        $this->flash($msg, '/Tasks/index');
    }

    public function create() {
        if ($this->request->is('post')) {
            $data = [
                'name' => $this->request->data['name'],
                'body' => $this->request->data['body']
            ];
            $id = $this->Task->save($data);
            if ($id === false) {
                $this->render('create');
                return;
            }

            $msg = sprintf('create task %s', $this->Task->id);

            $this->flash($msg, '/Tasks/index');
            return;
        }
        $this->render('create');
    }

    public function edit() {
        $id = $this->request->pass[0];
        $options = [
            'conditions' => ['Task.id' => $id, 'Task.status' => 0]
        ];
        $task = $this->Task->find('first', $options);
        if ($task == false) {
            $this->Sesstion->setFlash('not found task');
            $this->redirect('/Tasks/index');
        }

        if ($this->request->is('post')) {
            $name = $this->request->data['Task']['name'];
            $body = $this->request->data['Task']['body'];
            $data = ['id' => $id, 'name' => $name, 'body' => $body];

            if ($this->Task->save($data)) {
                $this->Session->setFlash('complete edit');
                $this->redirect('/Tasks/index');
            }
        } else {
            $this->request->data = $task;
        }
    }
}