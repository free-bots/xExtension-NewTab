<?php

class FreshExtension_item_Controller extends Minz_ActionController
{
    public function currentAction()
    {
        header('Content-Type: application/json');
        $this->view->_layout(null);

        try {
            FreshRSS_Context::updateUsingRequest(false);
        } catch (FreshRSS_Context_Exception $e) {
            Minz_Error::error(404);
        }

        try {
            $entries = FreshRSS_index_Controller::listEntriesByContext();
            $urls = [];
            foreach ($entries as $entry) {
                $urls[] = $entry->link();
            }
            echo json_encode($urls);
        } catch (FreshRSS_EntriesGetter_Exception $e) {
            Minz_Log::notice($e->getMessage());
            Minz_Error::error(404);
        }
    }
}
