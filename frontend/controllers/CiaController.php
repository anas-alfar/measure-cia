<?php
namespace frontend\controllers; // beastbytes\wizard\controllers;

use Yii;
use yii\web\Controller;
use beastbytes\wizard\WizardBehavior;

class CiaController extends Controller
{
    public $defaultAction = 'registration';
    
    public function beforeAction($action)
    {
        $config = [];
        switch ($action->id) {
            case 'registration':
                $config = [
                    'steps' => ['step1', 'step2', 'step3'],
                    'events' => [
                        WizardBehavior::EVENT_WIZARD_STEP => [$this, $action->id.'WizardStep'],
                        WizardBehavior::EVENT_AFTER_WIZARD => [$this, $action->id.'AfterWizard'],
                        WizardBehavior::EVENT_INVALID_STEP => [$this, 'invalidStep']
                    ]
                ];
                break;
            case 'resume':
                $config = ['steps' => []]; // force attachment of WizardBehavior
            default:
                break;
        }

        if (!empty($config)) {
            $config['class'] = WizardBehavior::className();
            $this->attachBehavior('wizard', $config);
        }

        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionRegistration($step = null)
    {
        //if ($step===null) $this->resetWizard();
        return $this->step($step);
    }

    /**
    * Process wizard steps.
    * The event handler must set $event->handled=true for the wizard to continue
    * @param WizardEvent The event
    */
    public function registrationWizardStep($event)
    {
        if (empty($event->stepData)) {
            $modelName = 'backend\\models\\wizard\\registration\\'.ucfirst($event->step);
            $model = new $modelName();
        } else {
            $model = $event->stepData;
        }

        $post = Yii::$app->request->post();

        if (isset($post['cancel'])) {
            $event->continue = false;
        } elseif ($model->load($post) && $model->validate()) {
            $event->data    = $model;
            $event->handled = true;

            switch ($event->step) {
                case 'step1':

                    $stats = array();
                    $modelIds = array();
                    $stats['modelIds'] = array();
                    $stats['total_rows'] = 0;
                    $stats['imported_rows'] = 0;
                    $stats['invalid_rows'] = 0;

                    $description = '';
                    $index = '';
                    $cve_id = '';
                    $vulnerability_types = '';
                    $publish_date = '';
                    $score = '';
                    $confidentiality = '';
                    $integrity = '';
                    $availability = '';

                    foreach ($model->attributes as $key => $value) {
                        if ($key == 'product_name') {
                            continue;
                        }
                        if (empty($value)) {
                            continue;
                        }
                        file_put_contents('/tmp/tmpfile.html', file_get_contents($value));
                        $html = file_get_contents('/tmp/tmpfile.html');
                        $html = substr($html, strpos($html, '<div id="searchresults">'));
                        $html = substr($html, 0, strpos($html, '<div class="paging" id="pagingb">'));
                        $html = strip_tags($html, '<table><tr><td><th>');
                        file_put_contents('/tmp/tmpfile.html', $html);

                        $dom = new \DOMDocument();
                        $dom->loadHtml($html);

                        $dom_xpath = new \DOMXpath($dom);
                        //$elements = $dom_xpath->query("*/div[@id='searchresults']");
                        $elements = $dom_xpath->query("//tr");
                        $isNewEntry = true;
                        $isHeaderRow = true;

                        if (!is_null($elements)) {
                            foreach ($elements as $element) {
                                if ($isHeaderRow) {
                                    $isHeaderRow = false;
                                    continue;
                                }
                                if ($isNewEntry) {
                                    ++$stats['total_rows'];
                                    $childNodes = $element->childNodes;
                                    $index = $childNodes->item(0)->nodeValue;
                                    $cve_id = $childNodes->item(2)->nodeValue;
                                    $vulnerability_types = $childNodes->item(8)->nodeValue;
                                    $confidentiality = $childNodes->item(24)->nodeValue;
                                    $integrity = $childNodes->item(26)->nodeValue;
                                    $availability = $childNodes->item(28)->nodeValue;
                                    $isNewEntry = false;
                                } else {
                                    $childNodes = $element->childNodes;
                                    $description = $childNodes->item(0)->nodeValue;
                                    $isNewEntry = true;
                                    try {
                                        $cveDetailsModel = new \frontend\models\CveDetails();
                                        $cveDetailsModel->product = trim($model->product_name);
                                        $cveDetailsModel->cve = trim($cve_id);
                                        $cveDetailsModel->vulnerability = trim($vulnerability_types);
                                        $cveDetailsModel->conf = trim($confidentiality);
                                        $cveDetailsModel->integrity = trim($integrity);
                                        $cveDetailsModel->availability = trim($availability);
                                        $cveDetailsModel->description = trim($description);
                                        $id = $cveDetailsModel->save(false);

                                        $description = '';
                                        $cve_id = '';
                                        $vulnerability_types = '';
                                        $confidentiality = '';
                                        $integrity = '';
                                        $availability = '';

                                        array_push($modelIds, $cveDetailsModel->id);
                                        $stats['modelIds'] = $modelIds;
                                        $stats['product'] = $cveDetailsModel->product;

                                        ++$stats['imported_rows'];
                                    } catch (\Exception $e ) {
                                        ++$stats['invalid_rows'];
                                        continue;
                                    } catch (\PDOException $e ) {
                                        ++$stats['invalid_rows'];
                                        continue;
                                    }
                                }
                            }
                        }
                    }
                    $session = Yii::$app->session;
                    if ($session->isActive) {
                        $session->set('stats', $stats);
                    }
                break;
                case 'step2':
                    //do nothing
                break;
                case 'step3':
                    //do nothing
                break;
                case 'step4':
                    echo 'STEP-4'; die;
                break;
            }

            if ($event->n < 2 && isset($post['add'])) {
                $event->nextStep = WizardBehavior::DIRECTION_REPEAT;
            }
        } else {
            $event->data = $this->render('registration/'.$event->step, compact('event', 'model'));
        }
    }

    public function actionProcessData()
    {
        $post = Yii::$app->request->post();
        if (isset($post['process'])) {
            $session = Yii::$app->session;
            $stats = $session->get('stats');
            if (!empty($stats['modelIds'])) { 
                $result = \frontend\models\CveDetailsSearch::find()->where(['id' => $stats['modelIds'] ])->all();;
                $response['data']['total_cve'] = sizeof($result);
                $response['data']['matched_cve'] = 0;
                $response['data']['matched_files'] = 0;
                $response['data']['invalid_cve'] = 0;
                foreach ($result as $row => $value) {
                    $this->scoreConversion($value->id, $value->conf, $value->integrity, $value->availability);
                    try{ 
                        $versionsMapping = $this->findVersion($value->description);
                        if (!empty($versionsMapping)) {
                            $versionsMapping = $versionsMapping [0];
                        } else {
                            $versionsMapping = '';
                        }
                        $phpFilesMapping = $this->findPhpFiles($value->description);
                        if (empty($phpFilesMapping)) {
                            ++$response['data']['invalid_cve'];
                            continue;
                        }
                        ++$response['data']['matched_cve'];
                        $response['data']['matched_files'] += sizeof($phpFilesMapping);
                        foreach ($phpFilesMapping as $filename) {
                            $cveFileModel = new \frontend\models\CveFile();
                            $cveFileModel->cve = trim($value->cve);
                            $cveFileModel->filename = trim($versionsMapping) . trim($filename);
                            $cveFileModel->save(false);
                        }
                    } catch (\Exception $e ) {
                        continue;
                    } catch (\PDOException $e ) {
                        continue;
                    }
                }
                $response["success"] = 1;
                $response["error"] = 0;
            }
        }else{
            $response["success"] = 0;
            $response["error"] = 1;
            // do your query stuff here
        }
        $session = Yii::$app->session;
        if ($session->isActive) {
            $session->set('data', $response['data']);
        }
        sleep($response['data']['total_cve']/50);
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        // return Json    
        return \yii\helpers\Json::encode($response);
    }
    
    private function scoreConversion($id, $conf, $integrity, $availability) {
        try {
            $cveDetailsModel = \frontend\models\CveDetails::findOne($id);
            $cveDetailsModel->conf = $this->staticScoresMapping($conf);
            $cveDetailsModel->integrity = $this->staticScoresMapping($integrity);
            $cveDetailsModel->availability = $this->staticScoresMapping($availability);
            $cveDetailsModel->save(false);
        } catch (\Exception $e ) {
            //do nothing
        } catch (\PDOException $e ) {
            //do nothing
        }
    }

    private function staticScoresMapping ($textualScore = NULL) {
        switch ($textualScore) {
            case 'Complete':
                return '0.66';
                break;
            case 'Partial':
                return '0.275';
                break;
            case 'None':
                return '0.0';
                break;
            default:
                return $textualScore;
                break;
        }
    }

    private function findVersion ($description) {
        preg_match_all('@[0-9]+\.[0-9\+]+[\.0-9\+]*[\.\+0-9a-zA-Z]*@', $description, $matches);
        return $matches[0];
    }

    private function findPhpFiles ($description) {
        preg_match_all('@[/_a-zA-Z0-9\-\.]*.php@', $description, $matches);
        return $matches[0];
    }

    /**
    * @param WizardEvent The event
    */
    public function invalidStep($event)
    {
        $event->data = $this->render('invalidStep', compact('event'));
        $event->continue = false;
    }

    /**
    * Registration wizard has ended; the reason can be determined by the
    * step parameter: TRUE = wizard completed, FALSE = wizard did not start,
    * <string> = the step the wizard stopped at
    * @param WizardEvent The event
    */
    public function registrationAfterWizard($event)
    {
        if (is_string($event->step)) {
            $uuid = sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                mt_rand(0, 0xffff), mt_rand(0, 0xffff),
                mt_rand(0, 0xffff),
                mt_rand(0, 0x0fff) | 0x4000,
                mt_rand(0, 0x3fff) | 0x8000,
                mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
            );

            $registrationDir = Yii::getAlias('@runtime/registration');
            $registrationDirReady = true;
            if (!file_exists($registrationDir)) {
                if (!mkdir($registrationDir) || !chmod($registrationDir, 0775)) {
                    $registrationDirReady = false;
                }
            }
            $event->data = $this->render('registration/notPaused');
        } elseif ($event->step === null) {
            $event->data = $this->render('registration/cancelled');
        } elseif ($event->step) {
            $event->data = $this->render('registration/complete', [
                'data' => $event->stepData
            ]);
        } else {
            $event->data = $this->render('registration/notStarted');
        }
    }

    /**
    * Method description
    *
    * @return mixed The return value
    */
    public function actionResume($uuid)
    {
        $registrationFile = Yii::getAlias('@runtime/registration').DIRECTORY_SEPARATOR.$uuid;
        if (file_exists($registrationFile)) {
            $this->resumeWizard(@file_get_contents($registrationFile));
            unlink($registrationFile);
            $this->redirect(['registration']);
        } else {
            return $this->render('registration/notResumed');
        }
    }
}
