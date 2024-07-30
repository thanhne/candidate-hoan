<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Project extends ResourceController
{
    protected $modelName = 'App\Models\ProjectModel';
    protected $format    = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll(), 200);
    }

    public function show($id = null)
    {
        $data = $this->model->find($id);

        if (is_null($data)) {
            return $this->fail(['error' => 'Project does not exist'], 404);
        }

        return $this->respond($data, 200);
    }

    public function create()
    {
        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
        ];

        if ($this->model->insert($data) === false) {

            $response = [
                'errors' => $this->model->errors(),
                'message' => 'Invalid Inputs'
            ];

            return $this->fail($response, 409);
        }

        return $this->respond(['message' => 'Created Successfully'], 201);
    }

    public function update($id = null)
    {
        if ($id === null || !$this->model->find($id)) {
            return $this->failNotFound('Project not found');
        }

        $data = [
            'name' => $this->request->getVar('name'),
            'description' => $this->request->getVar('description'),
        ];

        if (!$this->model->update($id, $data)) {
            $response = [
                'errors' => $this->model->errors(),
                'message' => 'Invalid Inputs'
            ];

            return $this->fail($response, 409);
        }

        return $this->respond(['message' => 'Updated Successfully'], 200);
    }

    public function delete($id = null)
    {
        $this->model->delete($id);

        return $this->respond(['message' => 'Deleted Successfully'], 200);
    }
}
