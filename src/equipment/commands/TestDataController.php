<?php
namespace app\commands;

use app\models\BaseAppModel;
use app\models\Category;
use app\models\Employee;
use app\models\Equipment;
use app\models\LendingHistory;
use app\models\SystemUser;
use yii\console\Controller;

class TestDataController extends Controller
{
    /**
     * Syntax:
     * ./yii test-data/init-category
     */
    public function actionInitCategory()
    {
        $categories = [
            'ノート型PC',
            'デックストップ',
            'スピーカー',
            'モニター',
            '携帯電話',
            '携帯電話2',
        ];
        foreach ($categories as $categoryName) {
            $category = Category::findOneCreateNew([
                'name' => $categoryName,
            ]);
            $category->data_status = Category::DATA_STATUS_NORMAL;
            $category->saveThrowError();
        }        
    }

    /**
     * Syntax:
     * ./yii test-data/init-employee
     */
    public function actionInitEmployee()
    {
        for ($i = 1; $i <= 50; $i++) {
            $employeeNo = "$i";
            $employeeName = "Employee $i";
            $employee = Employee::findOneCreateNew([
                'employee_no' => $employeeNo,
            ]);
            $employee->name = $employeeName;
            $employee->data_status = Employee::DATA_STATUS_NORMAL;
            $employee->working_status = Employee::WORKING_STATUS_NORMAL;
            $employee->saveThrowError();
        }
    }

    /**
     * Syntax:
     * ./yii test-data/init-equipment
     */
    public function actionInitEquipment()
    {
        for ($i = 1; $i <= 50; $i++) {
            $equipment = Equipment::findOneCreateNew([
                'code' => "CODE $i",
            ]);
            $equipment->category_id = 1;
            $equipment->name = "Frontier $i";
            $equipment->model_number = "Model $i";
            $equipment->serial_number = "Serial $i";
            $equipment->specification = "specification $i";
            $equipment->accessory = "accessory $i";
            $equipment->remarks = "remarks $i";
            $equipment->buy_date = "2019/08/" . ($i % 28 + 1);
            $equipment->payment_amount = 10000 + $i;
            $equipment->equipment_status = Equipment::EQUIPMENT_STATUS_NORMAL;
            // $employee->data_status = Employee::DATA_STATUS_NORMAL;
            $equipment->saveThrowError();
        }
    }

    /**
     * Syntax:
     * ./yii test-data/init-landing-history
     */
    public function actionInitLandingHistory()
    {
        $employees = Employee::find()->all();
        $equipments = Equipment::find()->all();
        foreach ($equipments as $i => $equipment) {
            if (isset($employees[$i])) {
                $employee = $employees[$i];
                $lendingHistory = LendingHistory::findOneCreateNew([
                    'employee_id' => $employee->id,
                    'equipment_id' => $equipment->id,
                ]);
                $lendingHistory->lending_date = '2019/08/19';
                if ($i % 2 == 0) {
                    $lendingHistory->return_date = '2019/08/21';
                }
                $lendingHistory->remarks = "Remarks $i";
                $lendingHistory->borrower_name = $lendingHistory->employee->name;
                $lendingHistory->saveThrowError();
            }
        }
    }
    /**
     * Syntax:
     * ./yii test-data/init-system-user
     */
    public function actionInitSystemUser()
    {
        for ($i = 0; $i <= 1; $i++) {
            $systemUser = SystemUser::findOneCreateNew(['username' => "User $i"]);
            $systemUser->email = "user$i@example.com";
            $systemUser->privileges = $i % 2 + 1;
            $systemUser->data_status = BaseAppModel::DATA_STATUS_NORMAL;
            $systemUser->saveThrowError();
        }
    }

}
