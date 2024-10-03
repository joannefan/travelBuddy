<?php
function createHeroSection($imageSrc, $altText, $heroText)
{
  echo '
    <header class="hero-section">
        <img src="' . $imageSrc . '" alt="' . $altText . '">
        <div class="hero-text">' . $heroText . '</div>
    </header>
    ';
}
