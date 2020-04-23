<?

namespace Sb\Support;

use Bitrix\Main\Config\Option;
use Bitrix\Main\Page\Asset;

class Main{

	public function appendScriptsToPage(){

		if(!defined("ADMIN_SECTION") && ADMIN_SECTION !== true){

			$module_id = pathinfo(dirname(__DIR__))["basename"];

			if(Option::get($module_id, "switch_on", "Y") === "Y") {
				Asset::getInstance()->addString(
					"<script>
						const ex = document.createElement('div');
						ex.style = 'position: fixed; bottom: 50px; left: 50px; width: 150px; color: white; background-color: blue; padding: 10px;'
						ex.textContent = 'пример работы модуля в публичной части';
						document.addEventListener('DOMContentLoaded', () => document.body.appendChild(ex));
					</script>",
					true
					);
				// Asset::getInstance()->addJs("/bitrix/js/".$module_id."/script.min.js");
			}
		}

		return false;
	}
}

// пример скрипта
// <script>
// 	<script>; data-skip-moving='true'>(function(w,d,u,b){s=d.createElement('script');r=(Date.now()/1000|0);s.async=1;s.src=u+'?'+r;h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);})(window,document,'https://cdn.bitrix24.ru/ID-EXAMPLE/crm/site_button/loader_4_ot9e2s.js');</script>;"
// 	document.body.appendChild(ex);
// </script>
