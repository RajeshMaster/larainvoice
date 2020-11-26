Date : 2017-08-31 10:51:46
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/app/Model/Expenses.php
Line : 84
Message : SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND month=0) AS DDD' at line 12 (SQL: select * from (SELECT FORMAT(Sum(Case When `subject` = 'cash' 
        								Then amount Else 0 End),0) AS cashTotal,
									FORMAT(Sum(Case When `subject` != 'cash' 
        								Then amount Else 0 End),0) AS expensesTotal,
									FORMAT(Sum(Case When `subject` = 'cash' 
        								Then amount Else 0 End)-
									Sum(Case When `subject` != 'cash' 
         								Then amount Else 0 End),0) AS balance,
									FORMAT(Sum(Case When `subject` = 'cash' AND carryForwardFlg!=1
         								Then amount Else 0 End),0) AS thisMonth
									FROM `dev_expenses` WHERE
									year= AND month=0) AS DDD)

Date : 2017-08-31 11:24:14
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/app/Model/Expenses.php
Line : 84
Message : SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND month=0) AS DDD' at line 12 (SQL: select * from (SELECT FORMAT(Sum(Case When `subject` = 'cash' 
        								Then amount Else 0 End),0) AS cashTotal,
									FORMAT(Sum(Case When `subject` != 'cash' 
        								Then amount Else 0 End),0) AS expensesTotal,
									FORMAT(Sum(Case When `subject` = 'cash' 
        								Then amount Else 0 End)-
									Sum(Case When `subject` != 'cash' 
         								Then amount Else 0 End),0) AS balance,
									FORMAT(Sum(Case When `subject` = 'cash' AND carryForwardFlg!=1
         								Then amount Else 0 End),0) AS thisMonth
									FROM `dev_expenses` WHERE
									year= AND month=0) AS DDD)

