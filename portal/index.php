<?php
require_once 'controllers/template.controller.php';

require_once 'controllers/class.controller.php';
require_once 'controllers/tutor.controller.php';
require_once 'controllers/parent.controller.php';
require_once 'controllers/kid.controller.php';
require_once 'controllers/invoice.controller.php';
require_once 'controllers/payment.controller.php';
require_once 'controllers/notice.controller.php';
require_once 'controllers/admin.controller.php';
require_once 'controllers/message.controller.php';
require_once 'controllers/activity.controller.php';
require_once 'controllers/login.handler.php';
require_once 'controllers/attendance.controller.php';



require_once 'models/connection.php';
require_once 'models/class.model.php';
require_once 'models/tutor.model.php';
require_once 'models/parent.model.php';
require_once 'models/kid.model.php';
require_once 'models/invoice.model.php';
require_once 'models/payment.model.php';
require_once 'models/notice.model.php';
require_once 'models/admin.model.php';
require_once 'models/activity.model.php';
require_once 'models/message.model.php';

$template = new templateController();
$template->ctrTemplate();
