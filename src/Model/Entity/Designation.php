<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Designation Entity.
 *
 * @property int $id
 * @property string $name
 * @property string $payscale
 * @property int $company_id
 * @property int $user_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $modified_by
 * @property bool $is_active
 * @property \App\Model\Entity\Employee[] $employees
 * @property \App\Model\Entity\SalaryMaster[] $salary_masters
 */
class Designation extends Entity
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