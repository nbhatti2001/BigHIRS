<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Employeeloan Entity.
 *
 * @property int $id
 * @property int $employee_id
 * @property \App\Model\Entity\Employee $employee
 * @property int $loan_amount
 * @property int $installment_amount
 * @property int $balance_amount
 * @property int $company_id
 * @property \App\Model\Entity\Company $company
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $modified_by
 * @property bool $is_active
 */
class Employeeloan extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
