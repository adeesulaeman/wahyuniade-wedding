<?php
include('autoloader.php');

use Generator\DB;

switch(route(0)) {
	case "form":
		require_once('Controllers/Form.php');
		break;
	case "entities":
		require_once('Controllers/Entities.php');
		break;
	case "datatable_view":
		require_once('Controllers/Datatable_view.php');
		break;
	case "datatable_response":
		require_once('Controllers/Datatable_response.php');
		break;
	case "model":
		require_once('Controllers/Model.php');
		break;
	case "sidebartable":
		require_once('Controllers/Core/Sidebartable.php');
		break;
	default:
		require_once('views/layout.php');
		break;
}
