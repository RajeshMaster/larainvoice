Date : 2017-10-16 09:20:58
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/app/Model/Invoice.php
Line : 598
Message : SQLSTATE[42S22]: Column not found: 1054 Unknown column '' in 'order clause' (SQL: select * from `dev_invoices_registration` where `quot_date` LIKE %2017-09% and `del_flg` = 0 order by `` asc)

Date : 2017-10-16 09:58:45
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/vendor/laravel/framework/src/Illuminate/Support/Facades/Facade.php
Line : 217
Message : SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND salemp.year =
						WHERE employ.Emp_ID NOT IN (SELECT empNo FROM inv_salar' at line 3 (SQL: SELECT employ.* FROM inv_temp_salaryemp AS salemp
						LEFT JOIN emp_mstemployees employ ON salemp.Emp_Id=employ.Emp_ID 
						AND salemp.month= AND salemp.year =
						WHERE employ.Emp_ID NOT IN (SELECT empNo FROM inv_salary WHERE year = AND month=) 
						AND employ.resign_id=0 ORDER BY employ.Emp_ID)

Date : 2017-10-16 09:58:53
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/app/Model/Salary.php
Line : 380
Message : SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND emp_mstemployees.resign_id=1)>0 ,emp_mstemployees.resign_id=1,emp_mstemploye' at line 5 (SQL: select * from (SELECT FirstName,LastName,Emp_ID FROM emp_mstemployees WHERE delFLg=0 AND 
					IF( (SELECT COUNT(*) FROM inv_salary AS afterRes 
					WHERE afterRes.empNo = emp_mstemployees.Emp_ID AND afterRes.month=0
					AND afterRes.year=
					AND emp_mstemployees.resign_id=1)>0 ,emp_mstemployees.resign_id=1,emp_mstemployees.resign_id=0)
					AND Emp_ID NOT IN 
					(SELECT Emp_ID FROM inv_temp_salaryemp WHERE month=0 and year=) ORDER BY Emp_ID ASC) as tb1)

Date : 2017-10-16 10:00:03
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/app/Model/Salary.php
Line : 380
Message : SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND emp_mstemployees.resign_id=1)>0 ,emp_mstemployees.resign_id=1,emp_mstemploye' at line 5 (SQL: select * from (SELECT FirstName,LastName,Emp_ID FROM emp_mstemployees WHERE delFLg=0 AND 
					IF( (SELECT COUNT(*) FROM inv_salary AS afterRes 
					WHERE afterRes.empNo = emp_mstemployees.Emp_ID AND afterRes.month=0
					AND afterRes.year=
					AND emp_mstemployees.resign_id=1)>0 ,emp_mstemployees.resign_id=1,emp_mstemployees.resign_id=0)
					AND Emp_ID NOT IN 
					(SELECT Emp_ID FROM inv_temp_salaryemp WHERE month=0 and year=) ORDER BY Emp_ID ASC) as tb1)

Date : 2017-10-16 10:02:26
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/storage/framework/views/c9f6c03de28e348475f63dc552c7e4cf49b89070.php
Line : 190
Message : Undefined offset: 0 (View: /home/vps100812931/ssdev.microbit.co.jp/larainvoice/resources/views/Salary/addedit.blade.php)

Date : 2017-10-16 10:02:39
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/storage/framework/views/c9f6c03de28e348475f63dc552c7e4cf49b89070.php
Line : 190
Message : Undefined offset: 0 (View: /home/vps100812931/ssdev.microbit.co.jp/larainvoice/resources/views/Salary/addedit.blade.php)

Date : 2017-10-16 10:16:45
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/storage/framework/views/d2efda7ccddba68bb0f048fcc75bea5d5346b67b.php
Line : 58
Message : Undefined offset: 0 (View: /home/vps100812931/ssdev.microbit.co.jp/larainvoice/resources/views/Customer/Branchaddedit.blade.php)

Date : 2017-10-16 10:16:56
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/storage/framework/views/d2efda7ccddba68bb0f048fcc75bea5d5346b67b.php
Line : 58
Message : Undefined offset: 0 (View: /home/vps100812931/ssdev.microbit.co.jp/larainvoice/resources/views/Customer/Branchaddedit.blade.php)

Date : 2017-10-16 10:23:17
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/storage/framework/views/d2efda7ccddba68bb0f048fcc75bea5d5346b67b.php
Line : 58
Message : Undefined offset: 0 (View: /home/vps100812931/ssdev.microbit.co.jp/larainvoice/resources/views/Customer/Branchaddedit.blade.php)

Date : 2017-10-16 10:25:02
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/storage/framework/views/9751cf4533b269305f146658726060dfef4b0f17.php
Line : 131
Message : Undefined offset: 0 (View: /home/vps100812931/ssdev.microbit.co.jp/larainvoice/resources/views/Customer/View.blade.php)

Date : 2017-10-16 10:25:11
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/storage/framework/views/9751cf4533b269305f146658726060dfef4b0f17.php
Line : 131
Message : Undefined offset: 0 (View: /home/vps100812931/ssdev.microbit.co.jp/larainvoice/resources/views/Customer/View.blade.php)

Date : 2017-10-16 10:25:21
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/storage/framework/views/9751cf4533b269305f146658726060dfef4b0f17.php
Line : 131
Message : Undefined offset: 0 (View: /home/vps100812931/ssdev.microbit.co.jp/larainvoice/resources/views/Customer/View.blade.php)

Date : 2017-10-16 10:28:28
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/storage/framework/views/9751cf4533b269305f146658726060dfef4b0f17.php
Line : 131
Message : Undefined offset: 0 (View: /home/vps100812931/ssdev.microbit.co.jp/larainvoice/resources/views/Customer/View.blade.php)

Date : 2017-10-16 10:30:40
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/storage/framework/views/9751cf4533b269305f146658726060dfef4b0f17.php
Line : 131
Message : Undefined offset: 0 (View: /home/vps100812931/ssdev.microbit.co.jp/larainvoice/resources/views/Customer/View.blade.php)

Date : 2017-10-16 10:34:36
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/storage/framework/views/9751cf4533b269305f146658726060dfef4b0f17.php
Line : 131
Message : Undefined offset: 0 (View: /home/vps100812931/ssdev.microbit.co.jp/larainvoice/resources/views/Customer/View.blade.php)

Date : 2017-10-16 10:34:45
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/storage/framework/views/9751cf4533b269305f146658726060dfef4b0f17.php
Line : 131
Message : Undefined offset: 0 (View: /home/vps100812931/ssdev.microbit.co.jp/larainvoice/resources/views/Customer/View.blade.php)

Date : 2017-10-16 11:16:33
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/storage/framework/views/d2efda7ccddba68bb0f048fcc75bea5d5346b67b.php
Line : 58
Message : Undefined offset: 0 (View: /home/vps100812931/ssdev.microbit.co.jp/larainvoice/resources/views/Customer/Branchaddedit.blade.php)

Date : 2017-10-16 11:16:45
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/storage/framework/views/d2efda7ccddba68bb0f048fcc75bea5d5346b67b.php
Line : 58
Message : Undefined offset: 0 (View: /home/vps100812931/ssdev.microbit.co.jp/larainvoice/resources/views/Customer/Branchaddedit.blade.php)

Date : 2017-10-16 11:31:48
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/storage/framework/views/d2efda7ccddba68bb0f048fcc75bea5d5346b67b.php
Line : 58
Message : Undefined offset: 0 (View: /home/vps100812931/ssdev.microbit.co.jp/larainvoice/resources/views/Customer/Branchaddedit.blade.php)

Date : 2017-10-16 12:20:40
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/storage/framework/views/d2efda7ccddba68bb0f048fcc75bea5d5346b67b.php
Line : 58
Message : Undefined offset: 0 (View: /home/vps100812931/ssdev.microbit.co.jp/larainvoice/resources/views/Customer/Branchaddedit.blade.php)

Date : 2017-10-16 12:21:01
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/storage/framework/views/d2efda7ccddba68bb0f048fcc75bea5d5346b67b.php
Line : 58
Message : Undefined offset: 0 (View: /home/vps100812931/ssdev.microbit.co.jp/larainvoice/resources/views/Customer/Branchaddedit.blade.php)

Date : 2017-10-16 12:21:06
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/storage/framework/views/d2efda7ccddba68bb0f048fcc75bea5d5346b67b.php
Line : 58
Message : Undefined offset: 0 (View: /home/vps100812931/ssdev.microbit.co.jp/larainvoice/resources/views/Customer/Branchaddedit.blade.php)

Date : 2017-10-16 12:21:20
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/storage/framework/views/d2efda7ccddba68bb0f048fcc75bea5d5346b67b.php
Line : 58
Message : Undefined offset: 0 (View: /home/vps100812931/ssdev.microbit.co.jp/larainvoice/resources/views/Customer/Branchaddedit.blade.php)

Date : 2017-10-16 12:36:30
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/storage/framework/views/d2efda7ccddba68bb0f048fcc75bea5d5346b67b.php
Line : 58
Message : Undefined offset: 0 (View: /home/vps100812931/ssdev.microbit.co.jp/larainvoice/resources/views/Customer/Branchaddedit.blade.php)

Date : 2017-10-16 12:36:42
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/storage/framework/views/d2efda7ccddba68bb0f048fcc75bea5d5346b67b.php
Line : 58
Message : Undefined offset: 0 (View: /home/vps100812931/ssdev.microbit.co.jp/larainvoice/resources/views/Customer/Branchaddedit.blade.php)

