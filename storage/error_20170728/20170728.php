Date : 2017-07-28 11:36:56
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/vendor/laravel/framework/src/Illuminate/Database/Query/Builder.php
Line : 1671
Message : SQLSTATE[42S02]: Base table or view not found: 1146 Table 'vps10081_ssmbtest_invdb.mailcontent' doesn't exist (SQL: select count(*) as aggregate from `mailcontent` where `delFlg` = 0)

Date : 2017-07-28 11:53:58
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/app/Model/Mailcontent.php
Line : 138
Message : SQLSTATE[42S02]: Base table or view not found: 1146 Table 'vps10081_ssmbtest_invdb.mailtype' doesn't exist (SQL: select `mailcontent`.*, `mailtype`.`typeName` from `mailContent` left join `mailtype` on `mailcontent`.`mailType` = `mailtype`.`id` where `mailcontent`.`id` = 2 order by `mailId` asc)

Date : 2017-07-28 11:55:51
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/app/Model/Mailcontent.php
Line : 138
Message : SQLSTATE[42S02]: Base table or view not found: 1146 Table 'vps10081_ssmbtest_invdb.mailtype' doesn't exist (SQL: select `mailContent`.*, `mailType`.`typeName` from `mailContent` left join `mailtype` on `mailContent`.`mailType` = `mailType`.`id` where `mailContent`.`id` = 3 order by `mailId` asc)

Date : 2017-07-28 11:55:58
Path : /home/vps100812931/ssdev.microbit.co.jp/larainvoice/app/Model/Mailcontent.php
Line : 138
Message : SQLSTATE[42S02]: Base table or view not found: 1146 Table 'vps10081_ssmbtest_invdb.mailtype' doesn't exist (SQL: select `mailContent`.*, `mailType`.`typeName` from `mailContent` left join `mailtype` on `mailContent`.`mailType` = `mailType`.`id` where `mailContent`.`id` = 3 order by `mailId` asc)

