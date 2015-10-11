<?php
namespace Code4\View\Elements;
use Code4\View\PopulateFieldsTrait;

class Modal {

    use PopulateFieldsTrait;

    /**
     * Modal size: modal-lg, modal-sm, null
     * @var string
     */
    protected $size = '';

    /**
     * Modal title string
     * @var string
     */
    protected $title = '';

    /**
     * Modal body
     * @var string
     */
    protected $body = '';

    /**
     * Modal footer
     * @var string
     */
    protected $footer = '';

    /**
     * Jeżeli ustawiony do modala dodajemy <form>
     * @var string
     */
    protected $form = '';

    protected $class = '';

    protected $id = '';

    protected $options = [
        'size' => '',
        'title' => '',
        'body' => ''
    ];

    /**
     * Parametry możemy ustawić przekazując array lub kozystając z setterów.
     * @param array $options
     */
    public function __construct($options = []) {
        $this->populateFields($this->options);
    }


    public function getButton($type, $text = 'Zamknij', $attrib = []) {
        if ($type == 'close') {
            return '<button type="button" class="btn btn-white" data-dismiss="modal">'.$text.'</button>';
        }
    }


    /**
     * @return string
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param string $size
     * @return $this
     */
    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param string $body
     * @return $this
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @return string
     */
    public function getFooter()
    {
        return $this->footer;
    }

    /**
     * @param string $footer
     * @return $this
     */
    public function setFooter($footer)
    {
        $this->footer = $footer;
        return $this;
    }

    /**
     * @return string
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * @param string $form
     * @return $this
     */
    public function setForm($form)
    {
        $this->form = $form;
        return $this;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent() {
        return $this->body;
    }

    /**
     * @param $content
     * @return $this
     */
    public function setContent($content) {
        $this->body = $content;
        return $this;
    }

    public function render() {
        return view('viewElements::modal', ['el'=>$this])->render();
    }

    public function __toString() {
        return (string) $this->render();
    }
}