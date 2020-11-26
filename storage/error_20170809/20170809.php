Date : 2017-08-09 11:53:45
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/vendor/laravel/framework/src/Illuminate/Database/Query/Builder.php
Line : 1671
Message : SQLSTATE[HY000]: General error: 1271 Illegal mix of collations for operation 'like' (SQL: select count(*) as aggregate from `dev_invoices_registration` left join `dev_estimatesetting` on `dev_estimatesetting`.`id` = `dev_invoices_registration`.`project_type_selection` where `quot_date` LIKE % and `del_flg` = 0 and (`dev_invoices_registration`.`user_id` LIKE %フリー% or `dev_invoices_registration`.`company_name` LIKE %フリー% or `dev_invoices_registration`.`project_name` LIKE %フリー% or `dev_invoices_registration`.`quot_date` LIKE %フリー%))

