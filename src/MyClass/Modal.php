<?php

namespace App\MyClass;

class Modal
{
    private $id;
    private $title;
    private $imgName;

    public function __construct($id, $imgName, $title)
    {
        $this->id = $id;
        $this->imgName = $imgName;
        $this->title = $title;
    }
    public function lunch()
    {
        echo '
            <div
                class="modal fade"
                id="' . $this->id . '"
                tabindex="-1"
                role="dialog"
                aria-labelledby="myModalLabel"
                aria-hidden="true"
                >
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content modal-orange">
                    <div class="modal-header">
                        <h4 class="modal-title w-100" id="myModalLabel"> Application ' . $this->title . '</h4>
                        <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                        >
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="/images/projets/' . $this->imgName . '" alt="' . $this->title . '"
                        width="100%">
                    </div>
                    </div>
                </div>
            </div>
        ';
    }
}
