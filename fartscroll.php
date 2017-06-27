<?php
/**
 * Copyright 2017 Agilitation
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated
 * documentation files (the "Software"), to deal in the Software without restriction, including without limitation
 * the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the
 * Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE
 * WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR
 * OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 * @author Agilitation <hello@agilitation.fr>
 * @copyright  2017 Agilitation
 * @license    https://opensource.org/licenses/MIT  The MIT License
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

class FartScroll extends Module
{
    public function __construct()
    {
        $this->name = 'fartscroll';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Agilitation';
        $this->need_instance = 0;
        parent::__construct();
        $this->displayName = $this->trans('Fartscroll', array(), 'Modules.Fartscroll.Admin');
        $this->description = $this->trans(
            'A Prestashop implementation of TheOnion’s Fartscroll.js most elegant piece of software.',
            array(),
            'Modules.Fartscroll.Admin'
        );
        $this->ps_versions_compliancy = array('min' => '1.7.1.0', 'max' => _PS_VERSION_);
    }

    public function install()
    {
        if (!parent::install() || !$this->registerHook('displayHeader')) {
            return false;
        }
        return true;
    }

    public function uninstall()
    {
        return parent::uninstall();
    }

    public function hookDisplayHeader($params)
    {
        $this->context->controller->registerJavascript(
            'modules-fartscroll',
            'modules/' . $this->name . '/views/js/fartscroll.js',
            array('position' => 'bottom', 'priority' => 150)
        );
        return $this->display(__FILE__, 'views/templates/front/fartscroll.tpl');
    }
}
