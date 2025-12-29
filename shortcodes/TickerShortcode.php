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
            $duration = $sc->getParameter('duration', '30s');

            $content = $sc->getContent();
            $content = str_replace("\n", " ", $content);
            $content = str_replace("<ul>", "", $content);
            $content = str_replace("</ul>", "", $content);
            $content = str_replace("</li>", "", $content);

            $items = array_filter(explode("<li>", $content), fn($value) => trim($value) !== '');

            $output = $this->twig->processTemplate('partials/ticker.html.twig', [
                'ticker_id' => $id,
                'ticker_items' => $items,
                'background_color' => $bgColor,
                'duration' => $duration,
            ]);

            return $output;
        });
    }
}