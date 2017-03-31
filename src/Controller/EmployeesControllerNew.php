<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Employees Controller
 *
 * @property \App\Model\Table\EmployeesTable $Employees
 */
class EmployeesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
	 

    public function index()
    {
        $this->paginate = [
            'contain' => ['Stations', 'Departments', 'Companies', 'Banks', 'Designations', 'Payscales']
        ];
        $employees = $this->paginate($this->Employees);

        $this->set(compact('employees'));
        $this->set('_serialize', ['employees']);
    }

    /**
     * View method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => ['Stations', 'Departments', 'Companies', 'Banks', 'Designations', 'Payscales', 'Qualifications', 'SalaryMasters']
        ]);

        $this->set('employee', $employee);
        $this->set('_serialize', ['employee']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employee = $this->Employees->newEntity();
        if ($this->request->is('post')) {
            $employee = $this->Employees->patchEntity($employee, $this->request->data);
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The employee could not be saved. Please, try again.'));
            }
        }
        $stations = $this->Employees->Stations->find('list', ['limit' => 200]);
        $departments = $this->Employees->Departments->find('list', ['limit' => 200]);
        $companies = $this->Employees->Companies->find('list', ['limit' => 200]);
        $banks = $this->Employees->Banks->find('list', ['limit' => 200]);
        $designations = $this->Employees->Designations->find('list', ['limit' => 200]);
        $payscales = $this->Employees->Payscales->find('list', ['limit' => 200]);
        $this->set(compact('employee', 'stations', 'departments', 'companies', 'banks', 'designations', 'payscales'));
        $this->set('_serialize', ['employee']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employee = $this->Employees->patchEntity($employee, $this->request->data);
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The employee could not be saved. Please, try again.'));
            }
        }
        $stations = $this->Employees->Stations->find('list', ['limit' => 200]);
        $departments = $this->Employees->Departments->find('list', ['limit' => 200]);
        $companies = $this->Employees->Companies->find('list', ['limit' => 200]);
        $banks = $this->Employees->Banks->find('list', ['limit' => 200]);
        $designations = $this->Employees->Designations->find('list', ['limit' => 200]);
        $payscales = $this->Employees->Payscales->find('list', ['limit' => 200]);
        $this->set(compact('employee', 'stations', 'departments', 'companies', 'banks', 'designations', 'payscales'));
        $this->set('_serialize', ['employee']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employee = $this->Employees->get($id);
        if ($this->Employees->delete($employee)) {
            $this->Flash->success(__('The employee has been deleted.'));
        } else {
            $this->Flash->error(__('The employee could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
