<?php

namespace Grav\Plugin\Shortcodes;

use Thunder\Shortcode\Shortcode\ShortcodeInterface;

class TickerShortcode extends Shortcode
{
    public function init()
    {
        $this->shortcode->getHandlers()->add('ticker', function (ShortcodeInterface $sc) {
            $id = 'ticker-' . $this->shortcode->getId($sc);

            // Add assets
            $this->shortcode->addAssets('js', ['jquery', 101]);
            $this->shortcode->addAssets('css', 'plugin://shortcode-ticker/css/shortcode.ticker.min.css');

            $bgColor = $sc->getParameter('background-color', '');
            $duration = $sc->getParameter('duration', 'auto');
            $itemDuration = $sc->getParameter('item-duration', '5s');
            $separator = $sc->getParameter('separator', '');

            $content = $sc->getContent();
            $content = str_replace("\n", " ", $content);
            $content = str_replace("<ul>", "", $content);
            $content = str_replace("</ul>", "", $content);
            $content = str_replace("<p>", " ", $content);
            $content = str_replace("</p>", " ", $content);
            $content = str_replace("</li>", "", $content);

            $items = array_filter(explode("<li>", $content), fn($value) => trim($value) !== '');

            if ($duration === 'auto') {
                if (preg_match('/(\d+)(\D*)/', $itemDuration, $matches)) {
                    $duration = ((int)$matches[1]) * count($items);
                    if (count($matches) > 1) {
                        $duration = "$duration" . $matches[2];
                    }
                } else {
                    $duration = '30s';
                }
            }

            $output = $this->twig->processTemplate('partials/ticker.html.twig', [
                'ticker_id' => $id,
                'ticker_items' => $items,
                'background_color' => $bgColor,
                'duration' => $duration,
                'separator' => $separator,
            ]);

            return $output;
        });
    }
}