<?php
echo $this->render('../template/_form', ['model' => $model, 'formFields' => ['_id', 'description', 'date']]);