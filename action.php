<?php
require_once ('config.php');
require_once ($project_root.'/lib/connection.php'); 
require ($project_root.'/lib/ads_class.php'); 

switch ($_GET['action']) {
    case 'delete':
        $id=(int)$_GET['id'];
        $result=Ads::delAdFromDb($id);
        break;
    case 'save':
        if ($_POST['seller_name'] && $_POST['description']) { // если была нажата кнопка
        $post_ad = Ads::trimPOST($_POST);
        $ad=new Ads($post_ad);
        $result=$ad->saveAd();
        
        if (!$ad->getId()){
            $ad->setId();
        }
        $save_id=$ad->getId();
        $result['id']=$save_id;
        $result['row']=AdsStore::getInstance()->getSingleAdFromDb($save_id)->prepareForOutTableRowAjax();
        }
        break;
    case 'show':
        $edit_id=(int)$_GET['id'];
        $result=AdsStore::getInstance()->getSingleAdFromDb($edit_id)->prepareForOutSingleAd($edit_id);
        break;
    case 'countads':
        $result=Ads::countAdsInDb();
        break;
    default:
        break;
}
echo json_encode ($result);