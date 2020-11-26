Date : 2017-08-21 05:28:39
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/app/Model/Salary.php
Line : 278
Message : SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND emp_mstemployees.resign_id=1)>0 ,emp_mstemployees.resign_id=1,emp_mstemploye' at line 5 (SQL: select * from (SELECT FirstName,LastName,Emp_ID FROM emp_mstemployees WHERE delFLg=0 AND 
					IF( (SELECT COUNT(*) FROM inv_salary AS afterRes 
					WHERE afterRes.empNo = emp_mstemployees.Emp_ID AND afterRes.month=0
					AND afterRes.year=
					AND emp_mstemployees.resign_id=1)>0 ,emp_mstemployees.resign_id=1,emp_mstemployees.resign_id=0)
					AND Emp_ID NOT IN 
					(SELECT Emp_ID FROM inv_temp_salaryemp WHERE month=0 and year=) ORDER BY Emp_ID ASC) as tb1)

Date : 2017-08-21 08:49:37
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/app/Model/Expenses.php
Line : 549
Message : SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 (SQL: select `mstbank`.* from `mstbank` left join `mstbanks` on `mstbanks`.`id` = `mstbank`.`BankName` where CONCAT(mstbank.BankName,'-', mstbank.AccNo)!=)

Date : 2017-08-21 08:49:41
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/app/Model/Expenses.php
Line : 549
Message : SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 (SQL: select `mstbank`.* from `mstbank` left join `mstbanks` on `mstbanks`.`id` = `mstbank`.`BankName` where CONCAT(mstbank.BankName,'-', mstbank.AccNo)!=)

Date : 2017-08-21 08:55:59
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/app/Model/Expenses.php
Line : 549
Message : SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 (SQL: select `mstbank`.* from `mstbank` left join `mstbanks` on `mstbanks`.`id` = `mstbank`.`BankName` where CONCAT(mstbank.BankName,'-', mstbank.AccNo)!=)

