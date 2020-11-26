Date : 2017-10-03 09:48:48
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/vendor/laravel/framework/src/Illuminate/Support/Facades/Facade.php
Line : 217
Message : SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND salemp.year =
						WHERE employ.Emp_ID NOT IN (SELECT empNo FROM inv_salar' at line 3 (SQL: SELECT employ.* FROM inv_temp_salaryemp AS salemp
						LEFT JOIN emp_mstemployees employ ON salemp.Emp_Id=employ.Emp_ID 
						AND salemp.month= AND salemp.year =
						WHERE employ.Emp_ID NOT IN (SELECT empNo FROM inv_salary WHERE year = AND month=) 
						AND employ.resign_id=0 ORDER BY employ.Emp_ID)

Date : 2017-10-03 09:59:45
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/app/Model/Salary.php
Line : 380
Message : SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND emp_mstemployees.resign_id=1)>0 ,emp_mstemployees.resign_id=1,emp_mstemploye' at line 5 (SQL: select * from (SELECT FirstName,LastName,Emp_ID FROM emp_mstemployees WHERE delFLg=0 AND 
					IF( (SELECT COUNT(*) FROM inv_salary AS afterRes 
					WHERE afterRes.empNo = emp_mstemployees.Emp_ID AND afterRes.month=0
					AND afterRes.year=
					AND emp_mstemployees.resign_id=1)>0 ,emp_mstemployees.resign_id=1,emp_mstemployees.resign_id=0)
					AND Emp_ID NOT IN 
					(SELECT Emp_ID FROM inv_temp_salaryemp WHERE month=0 and year=) ORDER BY Emp_ID ASC) as tb1)

Date : 2017-10-03 13:38:05
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/vendor/laravel/framework/src/Illuminate/Routing/ControllerDispatcher.php
Line : 94
Message : Unexpected data found.
Data missing

