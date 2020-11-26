Date : 2018-01-30 12:21:29
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/vendor/laravel/framework/src/Illuminate/Support/Facades/Facade.php
Line : 217
Message : SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND salemp.year =
						WHERE employ.Emp_ID NOT IN (SELECT empNo FROM inv_salar' at line 3 (SQL: SELECT employ.* FROM inv_temp_salaryemp AS salemp
						LEFT JOIN emp_mstemployees employ ON salemp.Emp_Id=employ.Emp_ID 
						AND salemp.month= AND salemp.year =
						WHERE employ.Emp_ID NOT IN (SELECT empNo FROM inv_salary WHERE year = AND month=) 
						AND employ.resign_id=0 ORDER BY employ.Emp_ID)

Date : 2018-01-30 12:55:27
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/storage/framework/views/c9f6c03de28e348475f63dc552c7e4cf49b89070.php
Line : 121
Message : Undefined offset: 0 (View: /home/vps100812931/ssdev.microbit.co.jp/larainvoice/resources/views/Salary/addedit.blade.php)

