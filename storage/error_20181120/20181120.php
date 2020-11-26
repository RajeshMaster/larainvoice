Date : 2018-11-20 13:29:55
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/app/Http/Controllers/SalesdetailsController.php
Line : 1086
Message : Undefined variable: monthpos

Date : 2018-11-20 13:33:32
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/app/Http/Controllers/SalesdetailsController.php
Line : 1086
Message : Undefined variable: monthpos

Date : 2018-11-20 13:42:28
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/app/Http/Controllers/SalesdetailsController.php
Line : 1086
Message : Undefined variable: monthpos

Date : 2018-11-20 13:42:54
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/app/Http/Controllers/SalesdetailsController.php
Line : 1086
Message : Undefined variable: monthpos

Date : 2018-11-20 13:49:11
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/vendor/laravel/framework/src/Illuminate/Database/Query/Builder.php
Line : 1628
Message : SQLSTATE[42S22]: Column not found: 1054 Unknown column 'InvoiceNo' in 'order clause' (SQL: select * from (select 
  emp_ID1 as EMPID,quot_date,emp.LastName,FirstName,company_name,user_id,tax,DOJ,amount1 as amount,work_specific1 as work_spec
from dev_invoices_registration
LEFT JOIN emp_mstemployees as emp ON emp.Emp_ID = dev_invoices_registration.emp_ID1
WHERE quot_date LIKE '%2018-10%' AND emp_ID1 IS NOT NULL AND emp_ID1 != ''
union all
select 
  emp_ID2 as EMPID,quot_date,emp.LastName,FirstName,company_name,user_id,tax,DOJ,amount2 as amount,work_specific2 as work_spec
from dev_invoices_registration
LEFT JOIN emp_mstemployees as emp ON emp.Emp_ID = dev_invoices_registration.emp_ID2
WHERE quot_date LIKE '%2018-10%' AND emp_ID2 IS NOT NULL AND emp_ID2 != ''
union all
select 
  emp_ID3 as EMPID,quot_date,emp.LastName,FirstName,company_name,user_id,tax,DOJ,amount3 as amount,work_specific3 as work_spec
from dev_invoices_registration
LEFT JOIN emp_mstemployees as emp ON emp.Emp_ID = dev_invoices_registration.emp_ID3
WHERE quot_date LIKE '%2018-10%' AND emp_ID3 IS NOT NULL AND emp_ID3 != ''
union all
select 
  emp_ID4 as EMPID,quot_date,emp.LastName,FirstName,company_name,user_id,tax,DOJ,amount4 as amount,work_specific4 as work_spec
from dev_invoices_registration
LEFT JOIN emp_mstemployees as emp ON emp.Emp_ID = dev_invoices_registration.emp_ID4
WHERE quot_date LIKE '%2018-10%' AND emp_ID4 IS NOT NULL AND emp_ID4 != ''
union all
select 
  emp_ID5 as EMPID,quot_date,emp.LastName,FirstName,company_name,user_id,tax,DOJ,amount5 as amount,work_specific5 as work_spec
from dev_invoices_registration
LEFT JOIN emp_mstemployees as emp ON emp.Emp_ID = dev_invoices_registration.emp_ID5
WHERE quot_date LIKE '%2018-10%' AND emp_ID5 IS NOT NULL AND emp_ID5 != ''
union all
select 
  emp_ID6 as EMPID,quot_date,emp.LastName,FirstName,company_name,user_id,tax,DOJ,amount6 as amount,work_specific6 as work_spec
from dev_invoices_registration
LEFT JOIN emp_mstemployees as emp ON emp.Emp_ID = dev_invoices_registration.emp_ID6
WHERE quot_date LIKE '%2018-10%' AND emp_ID6 IS NOT NULL AND emp_ID6 != ''
union all
select 
  emp_ID7 as EMPID,quot_date,emp.LastName,FirstName,company_name,user_id,tax,DOJ,amount7 as amount,work_specific7 as work_spec
from dev_invoices_registration
LEFT JOIN emp_mstemployees as emp ON emp.Emp_ID = dev_invoices_registration.emp_ID7
WHERE quot_date LIKE '%2018-10%' AND emp_ID7 IS NOT NULL AND emp_ID7 != ''
union all
select 
  emp_ID8 as EMPID,quot_date,emp.LastName,FirstName,company_name,user_id,tax,DOJ,amount8 as amount,work_specific8 as work_spec
from dev_invoices_registration
LEFT JOIN emp_mstemployees as emp ON emp.Emp_ID = dev_invoices_registration.emp_ID8
WHERE quot_date LIKE '%2018-10%' AND emp_ID8 IS NOT NULL AND emp_ID8 != ''
union all
select 
  emp_ID9 as EMPID,quot_date,emp.LastName,FirstName,company_name,user_id,tax,DOJ,amount9 as amount,work_specific9 as work_spec
from dev_invoices_registration
LEFT JOIN emp_mstemployees as emp ON emp.Emp_ID = dev_invoices_registration.emp_ID9
WHERE quot_date LIKE '%2018-10%' AND emp_ID9 IS NOT NULL AND emp_ID9 != ''
union all
select 
  emp_ID10 as EMPID,quot_date,emp.LastName,FirstName,company_name,user_id,tax,DOJ,amount10 as amount,work_specific10 as work_spec
from dev_invoices_registration
LEFT JOIN emp_mstemployees as emp ON emp.Emp_ID = dev_invoices_registration.emp_ID10
WHERE quot_date LIKE '%2018-10%' AND emp_ID10 IS NOT NULL AND emp_ID10 != ''
union all
select 
  emp_ID11 as EMPID,quot_date,emp.LastName,FirstName,company_name,user_id,tax,DOJ,amount11 as amount,work_specific11 as work_spec
from dev_invoices_registration
LEFT JOIN emp_mstemployees as emp ON emp.Emp_ID = dev_invoices_registration.emp_ID11
WHERE quot_date LIKE '%2018-10%' AND emp_ID11 IS NOT NULL AND emp_ID11 != ''
union all
select 
  emp_ID12 as EMPID,quot_date,emp.LastName,FirstName,company_name,user_id,tax,DOJ,amount12 as amount,work_specific12 as work_spec
from dev_invoices_registration
LEFT JOIN emp_mstemployees as emp ON emp.Emp_ID = dev_invoices_registration.emp_ID12
WHERE quot_date LIKE '%2018-10%' AND emp_ID12 IS NOT NULL AND emp_ID12 != ''
union all
select 
  emp_ID13 as EMPID,quot_date,emp.LastName,FirstName,company_name,user_id,tax,DOJ,amount13 as amount,work_specific13 as work_spec
from dev_invoices_registration
LEFT JOIN emp_mstemployees as emp ON emp.Emp_ID = dev_invoices_registration.emp_ID13
WHERE quot_date LIKE '%2018-10%' AND emp_ID13 IS NOT NULL AND emp_ID13 != ''
union all
select 
  emp_ID14 as EMPID,quot_date,emp.LastName,FirstName,company_name,user_id,tax,DOJ,amount14 as amount,work_specific14 as work_spec
from dev_invoices_registration
LEFT JOIN emp_mstemployees as emp ON emp.Emp_ID = dev_invoices_registration.emp_ID14
WHERE quot_date LIKE '%2018-10%' AND emp_ID14 IS NOT NULL AND emp_ID14 != ''
union all
select 
  emp_ID15 as EMPID,quot_date,emp.LastName,FirstName,company_name,user_id,tax,DOJ,amount15 as amount,work_specific15 as work_spec
from dev_invoices_registration
LEFT JOIN emp_mstemployees as emp ON emp.Emp_ID = dev_invoices_registration.emp_ID15
WHERE quot_date LIKE '%2018-10%' AND emp_ID15 IS NOT NULL AND emp_ID15 != ''
) AS DDD order by `InvoiceNo` desc limit 50 offset 0)

