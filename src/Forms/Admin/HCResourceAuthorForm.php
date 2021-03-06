<?php
/**
 * @copyright 2018 interactivesolutions
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 * Contact InteractiveSolutions:
 * E-mail: hello@interactivesolutions.lt
 * http://www.interactivesolutions.lt
 */

declare(strict_types = 1);

namespace HoneyComb\Resources\Forms\Admin;

use HoneyComb\Starter\Forms\HCBaseForm;

/**
 * Class HCResourceAuthorForm
 * @package HoneyComb\Resources\Forms\Admin
 */
class HCResourceAuthorForm extends HCBaseForm
{
    /**
     * Creating form
     *
     * @param bool $edit
     * @return array
     * @throws \Illuminate\Container\EntryNotFoundException
     */
    public function createForm(bool $edit = false): array
    {
        $form = [
            'storageUrl' => route('admin.api.resource.author'),
            'buttons' => [
                'submit' => [
                    'label' => $this->getSubmitLabel($edit),
                ],
            ],
            'structure' => $this->getStructure($edit),
        ];

        return $form;
    }

    /**
     * @param string $prefix
     * @return array
     */
    public function getStructureNew(string $prefix): array
    {
        $form = [
            $prefix . 'name' => [
                "type" => "singleLine",
                "label" => trans("HCResource::resource_author.name"),
                "required" => 1,
            ],
            $prefix . 'description' => [
                "type" => "textArea",
                "label" => trans("HCResource::resource_author.description"),
                "rows" => 5,
            ],
            $prefix . 'copyright' => [
                "type" => "singleLine",
                "label" => trans("HCResource::resource_author.copyright"),
            ],
        ];

        if (request()->has('hc_new')) {
            $form[$prefix . 'hc_new'] = [
                "type" => "singleLine",
                "hidden" => 1,
                "value" => 1,
            ];
        }

        return $form;
    }

    /**
     * @param string $prefix
     * @return array
     */
    public function getStructureEdit(string $prefix): array
    {
        return $this->getStructureNew($prefix);
    }
}
