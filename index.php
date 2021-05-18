<?php

require __DIR__.'/lib/init.php';

$fillObj = new fill();

    for($i = 0 ;$i<10000;$i++) {

        $UserLog = array(
            'table' => 'employees',
            'data'=>[
                'emp_no' => $fillObj->getUuid(5),
                'birth_date' => "{$fillObj->getData('1958-01-02','1958-05-30')}",
                'first_name' => "{$fillObj->Englishname(4,10)}",
                'last_name' => "{$fillObj->Englishname(4,10)}",
                'gender' => $fillObj->getGender(),
                'hire_date' => "{$fillObj->getData('1958-06-01','1958-11-30')}"
            ]
        );


        try {
            // 开始事务
            $Mysql->beginTA();
            $Mysql->add($UserLog);

            // 提交事务
            $Mysql->commit();
        } catch(PDOException $e)
        {
            echo "插入失败". $e->getMessage();

            // 如果执行失败回滚
            $Mysql->rollback();
            //echo $sql . "<br>" ;
        }

    }






/*var_dump($fillObj->getData('2020-01-21','2020-02-03'));
var_dump($fillObj->getUuid(5));
var_dump($fillObj->getChar(5));
var_dump($fillObj->Englishname(2,8));
var_dump($fillObj->getGender());*/

