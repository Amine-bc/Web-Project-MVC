<?php

namespace app\controllers;

use app\core\Controller;
use app\core\middlewares\AdminMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\Admin;
use app\models\Cards;
use app\models\Donations;
use app\models\News;
use app\models\Notifications;
use app\models\Offers;
use app\models\Partners;
use app\models\SubscriptionPayments;
use app\models\Users;
use app\models\Volunteering;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AdminMiddleware(['AdminDashboard']));
        $this->registerMiddleware(new AdminMiddleware(['UserManage']));
        $this->registerMiddleware(new AdminMiddleware(['PartnersManage']));
        $this->registerMiddleware(new AdminMiddleware(['CardManage']));

    }
public function validate(Request $request){
        $bod = $request->getBody();
 $tableName = $request->getBody()['Vis'];
   // $primary = array_key_first($bod);

    switch($bod['Vis']){
            case 'Users':
                $class = Users::class;
                $primary = 'user_id'   ;
                break;

            case 'Partners':
                $class = Partners::class;

                break;

            case 'Donations':
                $class = Donations::class;

                break;
        }
    unset($bod['Vis']); // Remove the 'password' column from each row
        var_dump($primary);
        $row = $class::findWhere([$primary=> $bod['id']]);

        (new $class())->updateRows( ['validated'=>true],[$primary=> $bod['id'] ] );

    (new Response())->redirect('/manage'.$tableName);


}
    public function settings(){

       return $this->renderViewOnly('settings');

    }
    public function adminDashboard()
    {

        return $this->renderViewOnly('AdminDashboard', []);
    }
    public function managePartners($request)
    {
        if ($request->isGet()) {
            $class = Partners::class;
            $content = $class::findAll();
            $stats = Partners::stats();
            if (!empty($content)) {
                $data = $content[0];
                $labels = [];

                // Loop through the first row and extract field names, excluding 'password'
                foreach ($data as $field => $value) {
                    if (is_string($field) && $field !== 'password') {
                        $labels[] = $field;
                    }
                }

                // Filter out the password column from the content data
                foreach ($content as &$row) {
                    unset($row['password']); // Remove the 'password' column from each row
                }

                return $this->renderViewOnly('VisAdmin', ['labels' => $labels, 'content' => $content, 'Vis'=>'Partners', 'stats' => $stats]);
            }
        }


    }
//    public function manageMembers($request)
//    {
//
//    }
    public function manageDonations($request)
    {
        if ($request->isGet()) {
            $class = Donations::class;
            $content = $class::findAll();

            if (!empty($content)) {
                $data = $content[0];
                $labels = [];

                // Loop through the first row and extract field names, excluding 'password'
                foreach ($data as $field => $value) {
                    if (is_string($field) && $field !== 'password') {
                        $labels[] = $field;
                    }
                }

                // Filter out the password column from the content data
                foreach ($content as &$row) {
                    unset($row['password']); // Remove the 'password' column from each row
                }

                return $this->renderViewOnly('VisAdmin', ['labels' => $labels, 'content' => $content, 'Vis'=>'Donations']);
            }
        }

    }
    public function manageVolunteers($request)
    {
        if ($request->isGet()) {
            $class = Volunteering::class;
            $content = $class::findAll();

            if (!empty($content)) {
                $data = $content[0];
                $labels = [];

                // Loop through the first row and extract field names, excluding 'password'
                foreach ($data as $field => $value) {
                    if (is_string($field) && $field !== 'password') {
                        $labels[] = $field;
                    }
                }

                // Filter out the password column from the content data
                foreach ($content as &$row) {
                    unset($row['password']); // Remove the 'password' column from each row
                }

                return $this->renderViewOnly('VisAdmin', ['labels' => $labels, 'content' => $content, 'Vis'=>'Volunteers']);
            }
        }

    }


    public function manageNotifications($request)
    {
        if ($request->isGet()) {
            $class = Notifications::class;
            $content = $class::findAll();

            if (!empty($content)) {
                $data = $content[0];
                $labels = [];

                // Loop through the first row and extract field names, excluding 'password'
                foreach ($data as $field => $value) {
                    if (is_string($field) && $field !== 'password') {
                        $labels[] = $field;
                    }
                }

                // Filter out the password column from the content data
                foreach ($content as &$row) {
                    unset($row['password']); // Remove the 'password' column from each row
                }

                return $this->renderViewOnly('VisAdmin', ['labels' => $labels, 'content' => $content, 'Vis'=>'Notifications']);
            }
        }

    }

    public function manageUsers($request)
    {
        if ($request->isGet()) {
            $class = Users::class;
            $content = $class::findAll();

            if (!empty($content)) {
                $data = $content[0];
                $labels = [];

                // Loop through the first row and extract field names, excluding 'password'
                foreach ($data as $field => $value) {
                    if (is_string($field) && $field !== 'password') {
                        $labels[] = $field;
                    }
                }

                // Filter out the password column from the content data
                foreach ($content as &$row) {
                    unset($row['password']); // Remove the 'password' column from each row
                }

                return $this->renderViewOnly('VisAdmin', ['labels' => $labels, 'content' => $content, 'Vis'=>'Users']);
            }
        }

    }
    public function managePayments($request)
    {
        if ($request->isGet()) {
            $class = SubscriptionPayments::class;
            $content = $class::findAll();

            if (!empty($content)) {
                $data = $content[0];
                $labels = [];

                // Loop through the first row and extract field names, excluding 'password'
                foreach ($data as $field => $value) {
                    if (is_string($field) && $field !== 'password') {
                        $labels[] = $field;
                    }
                }

                // Filter out the password column from the content data
                foreach ($content as &$row) {
                    unset($row['password']); // Remove the 'password' column from each row
                }

                return $this->renderViewOnly('VisAdmin', ['labels' => $labels, 'content' => $content, 'Vis'=>'Payments']);
            }
        }

    }
    public function manageAdmin($request)
    {
        if ($request->isGet()) {
            $class = Admin::class;
            $content = $class::findAll();

            if (!empty($content)) {
                $data = $content[0];
                $labels = [];

                // Loop through the first row and extract field names, excluding 'password'
                foreach ($data as $field => $value) {
                    if (is_string($field) && $field !== 'password') {
                        $labels[] = $field;
                    }
                }

                // Filter out the password column from the content data
                foreach ($content as &$row) {
                    unset($row['password']); // Remove the 'password' column from each row
                }

                return $this->renderViewOnly('VisAdmin', ['labels' => $labels, 'content' => $content, 'Vis'=>'Admin']);
            }
        }


    }

    public function manageCards($request)
    {
        if ($request->isGet()) {
            $class = Cards::class;
            $content = $class::findAll();

            if (!empty($content)) {
                $data = $content[0];
                $labels = [];

                // Loop through the first row and extract field names, excluding 'password'
                foreach ($data as $field => $value) {
                    if (is_string($field) && $field !== 'password') {
                        $labels[] = $field;
                    }
                }

                // Filter out the password column from the content data
                foreach ($content as &$row) {
                    unset($row['password']); // Remove the 'password' column from each row
                }

                return $this->renderViewOnly('VisAdmin', ['labels' => $labels, 'content' => $content, 'Vis'=>'Cards']);
            }
        }

    }


    public function manageOffers($request)
    {
        if ($request->isGet()) {
            $class = Offers::class;
            $content = $class::findAll();

            if (!empty($content)) {
                $data = $content[0];
                $labels = [];

                // Loop through the first row and extract field names, excluding 'password'
                foreach ($data as $field => $value) {
                    if (is_string($field) && $field !== 'password') {
                        $labels[] = $field;
                    }
                }

                // Filter out the password column from the content data
                foreach ($content as &$row) {
                    unset($row['password']); // Remove the 'password' column from each row
                }

                return $this->renderViewOnly('VisAdmin', ['labels' => $labels, 'content' => $content, 'Vis'=>'Offers']);
            }
        }

    }

    public function manageNews($request)
    {
        if ($request->isGet()) {
            $class = News::class;
            $content = $class::findAll();

            if (!empty($content)) {
                $data = $content[0];
                $labels = [];

                // Loop through the first row and extract field names, excluding 'password'
                foreach ($data as $field => $value) {
                    if (is_string($field) && $field !== 'password') {
                        $labels[] = $field;
                    }
                }

                // Filter out the password column from the content data
                foreach ($content as &$row) {
                    unset($row['password']); // Remove the 'password' column from each row
                }

                return $this->renderViewOnly('VisAdmin', ['labels' => $labels, 'content' => $content, 'Vis'=>'News']);
            }
        }

    }
    public function deleteItem(Request $request){

        $tableName = $request->getBody()['Vis'];  // Get the table name
        $id = $request->getBody()['content_id']; // Get the content ID

        switch ($tableName) {
            case 'Users':
                Users::delete($id);
                break;

            case 'Partners':
                Partners::delete($id);
                break;

            case 'Donations':
                Donations::delete($id);
                break;

            case 'Volunteering':
                Volunteering::delete($id);
                break;

            case 'Notifications':
                Notifications::delete($id);
                break;

            case 'SubscriptionPayments':
                SubscriptionPayments::delete($id);
                break;

            case 'Admin':
                Admin::delete($id);
                break;

            default:
                // Handle the case when the table name is not recognized
                echo "Invalid table name: " . htmlspecialchars($tableName);
                break;
        }

        (new Response())->redirect('/manage'.$tableName);
    }

    public function editItem(Request $request)
    {
        if ($request->isPost()) {
            $data = $request->getBody() ;
            $tableName = $data['Vis'] ;
            $updatedData = [];

            foreach ($data as $key => $value) {
                if (strpos($key, 'cell-') === 0) {
                    $columnName = substr($key, 7); // Skip the "cell-" part

                    // Remove numbers from the beginning of $columnName until no number is found
                    while (is_numeric($columnName[0])) {
                        $columnName = substr($columnName, 1);
                    }
                    if (!ctype_alpha($columnName[0])) {
                        $columnName = substr($columnName, 1);
                    }
                    $updatedData[$columnName] = $value;
                }

            }
            $firstKey = array_key_first($updatedData);
var_dump($updatedData);

            switch ($tableName) {
                case 'Users':
                    $registerModel = new Users();
                    $class = Users::class;
                    break;

                case 'Partners':
                    $registerModel = new Partners();
                    $class = Partners::class;
                    break;

                case 'Donations':
                    $registerModel = new Donations();
                    $class = Donations::class;
                    break;

                case 'Volunteering':
                    $registerModel = new Volunteering();
                    $class = Volunteering::class;
                    break;

                case 'Notifications':
                    $registerModel = new Notifications();
                    $class = Notifications::class;
                    break;

                case 'SubscriptionPayments':
                    $registerModel = new SubscriptionPayments();
                    $class = SubscriptionPayments::class;
                    break;

                case 'Admin':
                    $registerModel = new Admin();
                    $class = Admin::class;
                    break;

                case 'Cards':
                    $registerModel = new Cards();
                    $class = Cards::class;
                    break;

                default:
                    // Handle the case when the table name is not recognized
                    echo "Invalid table name: " . htmlspecialchars($tableName);
                    break;
            }
            $registerModel->updateRows($updatedData, [$firstKey=>$updatedData[$firstKey] ]);
            ( new Response())->redirect('/manage'.$tableName);
        }


    }
public function addElement (Request $request){
      if ($request->isPost()) {

          $data = $request->getBody() ;
          $tableName =  $request->getBody()['Vis'];
          unset($data['Vis']);
          var_dump($data);
          $firstKey = array_key_first($data);
          if (isset($data[$firstKey])) {
              $data[$firstKey] = (int) $data[$firstKey]; // Convert to integer
          }
          switch ($tableName) {
              case 'Users':
                  $registerModel = new Users();
                  $class = Users::class;
                  break;

              case 'Partners':
                  $registerModel = new Partners();
                  $class = Partners::class;
                  break;

              case 'Donations':
                  $registerModel = new Donations();
                  $class = Donations::class;
                  break;

              case 'Volunteering':
                  $registerModel = new Volunteering();
                  $class = Volunteering::class;
                  break;

              case 'Notifications':
                  $registerModel = new Notifications();
                  $class = Notifications::class;
                  break;

              case 'SubscriptionPayments':
                  $registerModel = new SubscriptionPayments();
                  $class = SubscriptionPayments::class;
                  break;

              case 'Admin':
                  $registerModel = new Admin();
                  $class = Admin::class;
                  break;

                  case 'Cards':
                      $registerModel = new Cards();
                      $class = Cards::class;
                      break;

              case 'News':
                  $registerModel = new News();
                  $class = News::class;
                  break;
              default:



                  // Handle the case when the table name is not recognized
                  echo "Invalid table name: " . htmlspecialchars($tableName);
                  break;
          }

          $registerModel->insertRow($data);
          (new Response())->redirect('/manage'.$tableName);
      }

        if ($request->isGet()) {
            $Vis = $request->getBody()['Vis'] ;

            switch ($Vis) {
                case 'Users':
                    $labels = [
                        'user_id',
                        'name',
                        'email',
                        'password',
                        'role',
                        'subscription_status'
                    ];
                    break;

                case 'Partners':
                    $labels = [
                        'partner_id',
                        'name',
                        'category',
                        'email',
                        'password'
                    ];
                    break;

                case 'Donations':
                    $labels = [
                        'donation_id',
                        'recipient_need',
                        'recipient_organization',
                        'required_amount',
                        'assistance_details'
                    ];
                    break;

                case 'Volunteering':
                    $labels = [
                        'volunteer_id',
                        'event_name',
                        'participation_date'
                    ];
                    break;

                case 'Notifications':
                    $labels = [
                        'notification_id',
                        'user_id',
                        'title',
                    ];
                    break;

                case 'SubscriptionPayments':
                    $labels = [
                        'payment_id',
                        'user_id',
                        'amount',
                        'payment_date',
                        'status'
                    ];
                    break;

                case 'Admin':
                    $labels = [
                        'id',
                        'email',
                        'password'
                    ];
                    break;

                case 'Cards':
                    $labels = [
                        'id',
                        'subscription_name',
                        'price',
                    ];
                    break;

                case 'News':
                    $labels = [
                        'title',
                        'description',
                        'detailed_description'
                    ];
                    break;
                default:
                    // Handle the case when the table name is not recognized
                    echo "Invalid table name: " . htmlspecialchars($tableName);
                    break;
            }
            return $this->renderViewOnly('AddElement', ['labels'=>$labels, 'Vis'=>$Vis]);
        }
}
    public function login($admin,$request){

        $passwordFromDb = $admin[0]['password'];
        $password = $request->getBody()['password'];
        $hashedPassword = hash("sha256", $password);
        if( $hashedPassword == $passwordFromDb ){
            return true ;
        }
        return false;

    }
}
