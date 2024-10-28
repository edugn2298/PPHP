<?php
  $APP_URL = "http://localhost/PPHP/";
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <?php require_once "./Templates/head.php" ?>
</head>
<body>
  <?php require_once "./Templates/header.php" ?>
  <!-- banner -->
  <div class="bg-cover bg-no-repeat bg-center py-36" style="background-image: url('../img/banner_pc.webp');">
    <div class="container">
      <h1 class="text-6xl text-gray-800 font-medium mb-4 capitalize">
        best collection for <br> home decoration
      </h1>
      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aperiam <br>
        accusantium perspiciatis, sapiente
        magni eos dolorum ex quos dolores odio</p>
      <div class="mt-12">
        <a href="#" class="bg-primary border border-primary text-white px-8 py-3 font-medium rounded-md hover:bg-transparent hover:text-primary">Shop Now</a>
      </div>

    </div>
  </div>
  <!-- ./banner -->
  <!-- categories -->
  <div class="container py-16">
    <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">shop by category</h2>
    <div class="grid grid-cols-3 gap-3">
      <div class="relative rounded-sm overflow-hidden group">
        <svg t="1695204793781" class="icon w-full" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="15801" width="200" height="200"><path d="M349 502.4l41.5 2.8v49.3c-6 4-12.3 6.7-19.1 8.2-6.8 1.5-13.8 2-21.2 1.5-9.6-0.7-18.4-2.8-26.2-6.3-7.9-3.5-14.6-8.2-20.2-13.9s-9.9-12.3-13-19.8c-3-7.5-4.6-15.5-4.6-24.1 0-8.7 1.4-16.6 4.3-23.7s7-13.1 12.4-18 11.9-8.6 19.5-11 16.1-3.3 25.5-2.7c4.9 0.3 9.4 1 13.7 2.1 4.3 1.1 8.2 2.5 11.8 4.1 3.6 1.6 6.9 3.5 9.9 5.6s5.7 4.4 8 6.8l-7.8 11.4c-1.2 1.8-2.8 2.8-4.8 3.1-1.9 0.3-4-0.3-6.3-1.9-2.1-1.4-4.2-2.7-6-3.7-1.9-1.1-3.8-2-5.8-2.7s-4.1-1.3-6.2-1.7c-2.2-0.4-4.6-0.7-7.4-0.9-5.1-0.3-9.6 0.2-13.7 1.8-4.1 1.5-7.5 3.8-10.4 6.9s-5.1 6.8-6.6 11.3c-1.6 4.5-2.3 9.5-2.3 15.1 0 6.2 0.9 11.8 2.6 16.7s4.1 9.1 7.2 12.7c3.1 3.5 6.9 6.3 11.2 8.3 4.4 2 9.2 3.2 14.5 3.6 3.3 0.2 6.2 0.1 8.9-0.4 2.6-0.5 5.2-1.1 7.7-2v-17.7l-11.5-0.8c-1.7-0.1-3-0.7-4-1.6s-1.4-2.2-1.4-3.5v-14.9h-0.2zM404 495.1c5-4.1 10.6-7 16.7-8.8 6.1-1.7 12.7-2.4 19.7-1.9 5 0.3 9.5 1.5 13.6 3.4 4 1.9 7.5 4.4 10.3 7.5s5 6.7 6.4 10.8c1.5 4.1 2.2 8.5 2.2 13.3v51.9l-11.4-0.8c-2.4-0.2-4.1-0.6-5.3-1.3-1.2-0.7-2.2-2.1-3-4.2l-1.8-4.7c-2.1 1.6-4.1 3-6 4.2s-3.9 2.2-6 3-4.2 1.3-6.6 1.6c-2.3 0.3-4.9 0.3-7.7 0.2-3.8-0.3-7.2-1-10.3-2.2-3.1-1.2-5.7-2.8-7.9-4.9-2.2-2.1-3.8-4.6-5-7.5s-1.8-6.3-1.8-10c0-3 0.7-6 2.2-8.9 1.5-3 4.1-5.6 7.8-7.9 3.7-2.3 8.6-4.1 14.9-5.4 6.2-1.3 14.1-1.7 23.6-1.3v-3.5c0-4.9-1-8.4-3-10.7-2-2.3-4.8-3.6-8.5-3.8-2.9-0.2-5.3 0-7.2 0.5-1.9 0.5-3.5 1.1-5 1.8s-2.9 1.3-4.3 1.9c-1.4 0.5-3 0.8-5 0.6-1.7-0.1-3.2-0.6-4.3-1.6s-2.1-2-2.9-3.2l-4.4-8.1z m44.7 40.8c-5-0.1-9.1 0-12.3 0.5-3.2 0.4-5.7 1.1-7.6 1.9-1.9 0.8-3.2 1.8-3.9 3-0.7 1.2-1.1 2.5-1.1 3.9 0 2.8 0.8 4.9 2.3 6.1 1.5 1.3 3.8 2 6.8 2.2 3.2 0.2 6-0.2 8.4-1.1 2.4-1 4.8-2.6 7.3-5v-11.5h0.1zM591.6 462.6v116.7l-14.1-1c-2.1-0.1-3.8-0.6-5.2-1.4s-2.8-2-4.2-3.8l-55-73.3c0.2 2.1 0.4 4.1 0.4 6.1 0.1 2 0.1 3.8 0.1 5.5V574l-23.9-1.6V455.7l14.3 1c1.2 0.1 2.2 0.2 3 0.4 0.8 0.2 1.5 0.4 2.2 0.7 0.6 0.3 1.3 0.8 1.8 1.4 0.6 0.6 1.3 1.3 2 2.3l55.5 73.9c-0.3-2.3-0.5-4.5-0.6-6.6s-0.2-4.1-0.2-6V461l23.9 1.6z" p-id="15802"></path><path d="M822.5 90.9l-289.6-14-265.7 18.3c-5 0.4-13.8 1.3-25.3 3.6-15.7 4.3-30.1 12.4-42.3 23.9-20.1 19-31.2 44.9-31.2 72.7l1.4 574.3c0 46.9 32.8 87.7 77.9 97l369.6 78c7.5 1.7 19.8 2.5 30.2 2.5 17.6 0 243-46.7 243-46.7 40.9-8.2 69.5-42.3 69.5-82.9V220.7c0-75.2-58-129.8-137.5-129.8zM622 923.2l-369.7-78.1c-35.1-7.3-60.5-39.1-60.5-75.6l-1.4-574.3c0-21.8 8.6-42 24.4-56.9 11.6-11 25.9-18.6 41.5-20.4 3.6-0.4 6.2-1 14.3-1 0.9 0 1.8 0 2.7 0.1l369.8 25.5c41.8 2.5 74.5 36.9 74.5 78.2v626.9c0 23.7-10.6 45.8-29.1 60.6-18.6 14.8-42.8 20.3-66.5 15z m316.1-105.7c0 30-21.3 55.3-51.8 61.4L716 911.7c15-17.8 23.3-40.3 23.3-64V220.9c0-52.8-41.7-96.8-94.9-100L429 106l104.1-7.2 288.8 14c68.4 0 116.2 44.4 116.2 107.9v596.8z" p-id="15803"></path><path d="M189 376.6l-104.8-6.4c-5.9 0-10.3-3.6-11.4-9.5-11.7-27.5-11.6-57.9 0.2-84 1.4-5.2 6.2-9 11.9-9L189 274v102.6zM94.9 349l72.2 4.4v-58.7L95 290.3c-2.3-0.1-4.5 1.3-5.2 3.5-5.4 16.4-5.1 34.5 0.5 51.6 0.7 2.1 2.5 3.5 4.6 3.6z m-10.3-0.7h0.8c-0.3 0.1-0.6 0-0.8 0z" p-id="15804"></path><path d="M106 337.1c6.2 0 11.3-7.8 11.3-17.5s-5.1-17.5-11.3-17.5-11.3 7.8-11.3 17.5 5.1 17.5 11.3 17.5zM818 329.6c-16.8 0.4-29.6-11.6-29.6-27.2 0-16.4 12.2-29.6 27.9-29.9l46.3-2.5c16.8-0.4 29.6 11.6 29.6 27.2 0 16.4-12.1 29.5-27.7 29.9l-46.5 2.5z m44.8-37.8l-46.3 2.5c-4.2 0.1-6.3 3.9-6.3 7.6 0 3.9 3.8 5.9 7.4 5.8l46.6-2.5c3.9-0.1 6-3.9 6-7.5 0.1-4-3.8-6-7.4-5.9zM818.1 471.7c-15.1 0.3-27.4-9.8-29.8-24l-0.1-1.8c0-15.9 10.4-28.4 24.7-31.2l49.2-4.1c15.1-0.3 27.4 9.8 29.8 24l0.1 1.8c1 7.5-0.7 14.5-4.9 20.1-3.1 4.2-9.2 9.5-20.2 11.2l-0.7 0.1-48.1 3.9c0.1 0 0.1 0 0 0z m44.6-39.3l-47.4 3.9c-2 0.4-5.2 3.1-5.2 7.6 0.4 2.8 2.9 5.9 7.4 5.8l47-3.9c2.5-0.5 4.4-1.3 5.2-2.3 0.7-1 0.7-2.6 0.5-3.8l-0.1-1.5c-0.3-2.6-2.9-5.9-7.4-5.8z" p-id="15805"></path><path d="M818.6 615c-17.4 0.4-30.2-11.5-30.2-27.2 0-16.5 12.2-29.6 27.9-29.9l45.6-5.3h0.1c17.4-0.4 30.2 11.5 30.2 27.2 0 17.1-11.2 29.4-27.3 29.9l-46.3 5.3c0.1 0 0.1 0 0 0z m44.3-40.6l-45.6 5.3c-4.9 0.1-7 4.1-7 7.7 0 3.9 3.8 5.9 7.4 5.8l46.6-5.3c1.6 0 6-0.1 6-7.5 0.1-4.1-3.8-6.1-7.4-6z" p-id="15806"></path><path d="M803 779h-0.8c-7.5 0.2-13.8-6-13.8-13.5v-42.4c0-7.1 5.7-13.2 12.6-14l77.4-13.2c7.5-0.2 13.8 6 13.8 13.5v42.4c0 9-6.2 13.4-12.7 14L803 779z m7.3-49.4v26l60-10.3v-26l-60 10.3z" p-id="15807"></path></svg>
        <a href="#" class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">Bedroom</a>
      </div>
      <div class="relative rounded-sm overflow-hidden group">
        <svg t="1695204713593" class="icon w-full" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="15195" width="200" height="200"><path d="M447.5 955.9c-2.8 0-5.5-0.2-8.3-0.5-4.8-0.1-9.7-0.8-14.5-1.9l-189.1-44c-32.2-7.6-54.6-36-54.6-69V142.7c0-15.5 6.2-29.9 17.4-40.5 8.6-8.2 19.3-12 29.5-15.1C309.8 64 323.9 64.6 332 65l185.9 8.4c38.5 1.1 68.8 32.2 68.8 70.9v728.9c0 34.6-24.8 64-58.9 69.9l-68.2 11.8c-4.1 0.7-8.1 1-12.1 1z m-6.7-22.8c10.5 0 21.6-3.5 30.4-10.5 11.7-9.3 18.4-23.1 18.4-38.1v-716c0-26-20.3-47.3-46.2-48.5l-204.8-10.9c-9.2-0.5-18 2.8-24.7 9.2-6.7 6.4-10.4 15-10.4 24.3v697.8c0 22.6 15.4 42 37.3 47.2l187.4 43.6 12.6 1.9z m-138-843l141.7 7.6c37.8 1.8 67.5 32.9 67.5 70.9v716c0 14.9-4.6 29-12.9 40.8l24.9-4.3c23.4-4 40.3-24.1 40.3-47.8v-729c0-26.5-20.7-47.8-47.2-48.5l-191.4-8.6c-6.6-0.3-13.1 0.4-19.5 2.1-1.1 0.2-2.2 0.5-3.4 0.8zM840.5 370.1h-22.4v-78.4H691.2v78.4h-22.4V288c0-10.3 8.4-18.7 18.7-18.7h134.4c10.3 0 18.7 8.4 18.7 18.7v82.1zM809.4 698.7H699.9c-8.2 0-14.9-6.7-14.9-14.9v-56.6c0-1.9-1.1-3.6-2.9-4.4-19.4-8.3-31.9-27.3-31.9-48.4V385.1c0-8.2 6.7-14.9 14.9-14.9h179.2c8.2 0 14.9 6.7 14.9 14.9v189.5c0 20.9-12.4 39.8-31.7 48-1.9 0.8-3.2 2.7-3.2 4.8v56.3c0.1 8.3-6.6 15-14.9 15z m-102-22.4H802v-48.8c0-11.1 6.6-21 16.7-25.4 11-4.7 18.1-15.5 18.1-27.4V392.5H672.5v181.8c0 12.1 7.2 23.1 18.4 27.9 10 4.3 16.5 14.1 16.5 25v49.1z" p-id="15196"></path><path d="M795.7 955.9h-22.4V683.7h22.4v272.2z m-59.7 0h-22.4V683.7H736v272.2z" p-id="15197"></path><path d="M537.4 381.3m-11.2 0a11.2 11.2 0 1 0 22.4 0 11.2 11.2 0 1 0-22.4 0Z" p-id="15198"></path><path d="M537.4 426.1m-11.2 0a11.2 11.2 0 1 0 22.4 0 11.2 11.2 0 1 0-22.4 0Z" p-id="15199"></path><path d="M537.4 470.9m-11.2 0a11.2 11.2 0 1 0 22.4 0 11.2 11.2 0 1 0-22.4 0Z" p-id="15200"></path><path d="M537.4 515.7m-11.2 0a11.2 11.2 0 1 0 22.4 0 11.2 11.2 0 1 0-22.4 0Z" p-id="15201"></path><path d="M495.166 228.273l11.316-19.331 74.65 43.7-11.317 19.33zM495.094 286.515l11.316-19.331 74.65 43.7-11.317 19.331zM313 634c-1.3 0-2.5-0.2-3.8-0.7-4.9-1.8-7.9-6.6-7.4-11.7l9.3-89.1-25.4-1c-3.2-0.1-6.3-1.6-8.3-4.2-2-2.5-2.9-5.8-2.3-9l24.5-136.5c1-5.6 6-9.6 11.8-9.2l63.1 4.3c3.1 0.2 5.9 1.7 7.9 4 2 2.4 2.9 5.4 2.5 8.5l-6.8 57.8 43 2.2c4 0.2 7.6 2.6 9.4 6.1 1.8 3.6 1.6 7.9-0.7 11.2L322.4 629c-2.2 3.2-5.7 5-9.4 5z m-13.6-124.3l24.5 0.9c3.1 0.1 6 1.5 8 3.9 2 2.3 3 5.4 2.7 8.5l-5.8 55.6 71.5-107.8L365 469c-3.1-0.2-6-1.6-8-4s-2.9-5.5-2.6-8.5l6.8-58-41.4-2.8-20.4 114z" p-id="15202"></path></svg>
        <a href="#" class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">Mattrass</a>
      </div>
      <div class="relative rounded-sm overflow-hidden group">
        <svg t="1695204076572" class="icon w-full" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="11527" width="200" height="200"><path d="M452.3 892.8H138.7c-16.5 0-29.9-13.4-29.9-29.9V161.1c0-16.5 13.4-29.9 29.9-29.9h313.6c16.5 0 29.9 13.4 29.9 29.9V863c-0.1 16.4-13.5 29.8-29.9 29.8zM138.7 153.6c-4.1 0-7.5 3.3-7.5 7.5V863c0 4.1 3.3 7.5 7.5 7.5h313.6c4.1 0 7.5-3.4 7.5-7.5V161.1c0-4.1-3.3-7.5-7.5-7.5H138.7z" p-id="11528"></path><path d="M355.2 799.5c-9 0-17.7-4.1-23.9-11.1-6.4-7.4-9.7-17.4-9.7-29.1v-46.5c0-52.8 67.2-52.8 67.2 0v46.5c0 26.3-16.9 40.2-33.6 40.2z m0-104.6c-5.6 0-11.2 5.5-11.2 17.8v46.5c0 24.6 22.4 24.6 22.4 0v-46.5c0-12.3-5.6-17.8-11.2-17.8zM235.7 773.3c-20.6 0-37.3-16.7-37.3-37.3s16.7-37.3 37.3-37.3S273 715.4 273 736s-16.7 37.3-37.3 37.3z m0-52.2c-8.2 0-14.9 6.7-14.9 14.9s6.7 14.9 14.9 14.9 14.9-6.7 14.9-14.9-6.6-14.9-14.9-14.9zM373.9 590.4h-37.3c-8.8 0-14.9-8.2-14.9-19.9v-87.1c0-11.7 6.1-19.9 14.9-19.9h37.3c8.8 0 14.9 8.2 14.9 19.9v87.1c0 11.7-6.1 19.9-14.9 19.9zM344 568h22.4v-82.1H344V568zM217.1 653.9c-6.2 0-11.2-5-11.2-11.2V411.2c0-6.2 5-11.2 11.2-11.2s11.2 5 11.2 11.2v231.5c0 6.1-5.1 11.2-11.2 11.2zM261.9 594.1c-6.2 0-11.2-5-11.2-11.2v-97.1c0-6.2 5-11.2 11.2-11.2 6.2 0 11.2 5 11.2 11.2v97.1c0 6.2-5.1 11.2-11.2 11.2zM885.3 892.8H556.8c-16.5 0-29.9-13.4-29.9-29.9V161.1c0-16.5 13.4-29.9 29.9-29.9h328.5c16.5 0 29.9 13.4 29.9 29.9V863c0 16.4-13.4 29.8-29.9 29.8zM556.8 153.6c-4.1 0-7.5 3.3-7.5 7.5V863c0 4.1 3.4 7.5 7.5 7.5h328.5c4.1 0 7.5-3.4 7.5-7.5V161.1c0-4.1-3.4-7.5-7.5-7.5H556.8z" p-id="11529"></path><path d="M855.5 190.9H586.7c-8.2 0-14.9 6.7-14.9 14.9v612.3c0 8.2 6.7 14.9 14.9 14.9h268.8c8.2 0 14.9-6.7 14.9-14.9V205.9c0-8.3-6.7-15-14.9-15zM848 810.7H594.1V213.3H848v597.4z" p-id="11530"></path><path d="M774.8 769.6h-19.4c-8.8 0-15.7-7.5-15.7-17.2V644.9c0-9.6 6.9-17.2 15.7-17.2h19.4c6 0 11.4 3.6 14.5 9.6 0.7 1.4 2.5 4.4 5 5.1 7.5 2.1 12.7 9.2 12.7 17.4v77.6c0 8.1-5.2 15.3-12.6 17.4-2.6 0.7-4.4 3.8-5 5.1-3.2 6.1-8.6 9.7-14.6 9.7z m-12.7-22.4h8.6c3.5-5.8 8.2-10.1 13.8-12.6v-71.9c-5.5-2.5-10.3-6.8-13.8-12.6h-8.6v97.1zM668.8 381.3c-8.8 0-17.1-3.4-23.3-9.5-4.7-4.7-10.3-13.1-10.3-26.6v-39.8c0-47.4 67.2-47.4 67.2 0v39.8c0 23.7-16.9 36.1-33.6 36.1z m0-89.6c-5.4 0-11.2 3.6-11.2 13.7v39.8c0 10.1 5.8 13.7 11.2 13.7s11.2-3.6 11.2-13.7v-39.8c0-10.1-5.8-13.7-11.2-13.7zM792 560.5h-37.3c-8.6 0-14.9-7.8-14.9-18.7v-74.7c0-10.8 6.3-18.7 14.9-18.7H792c8.6 0 14.9 7.9 14.9 18.7v74.7c0 10.9-6.3 18.7-14.9 18.7z m-29.9-22.4h22.4v-67.2h-22.3l-0.1 67.2zM792 381.3h-37.3c-8.6 0-14.9-7.9-14.9-18.7V288c0-10.8 6.3-18.7 14.9-18.7H792c8.6 0 14.9 7.9 14.9 18.7v74.7c0 10.8-6.3 18.6-14.9 18.6z m-29.9-22.4h22.4v-67.2h-22.3l-0.1 67.2zM665.1 758.4c-6.2 0-11.2-5-11.2-11.2v-97.1c0-6.2 5-11.2 11.2-11.2 6.2 0 11.2 5 11.2 11.2v97.1c0 6.2-5.1 11.2-11.2 11.2zM665.1 564.3c-6.2 0-11.2-5-11.2-11.2V456c0-6.2 5-11.2 11.2-11.2 6.2 0 11.2 5 11.2 11.2v97.1c0 6.1-5.1 11.2-11.2 11.2z" p-id="11531"></path></svg>
        <a href="#" class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">Outdoor</a>
      </div>
      <div class="relative rounded-sm overflow-hidden group">
        <svg class="icon w-full" aria-hidden="true"><use xlink:href="#icon-Cables_icon"></use> </svg>
        <a href="#" class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">Sofa</a>
      </div>
      <div class="relative rounded-sm overflow-hidden group">
        <svg class="icon w-full" aria-hidden="true"><use xlink:href="#icon-a-CarChargers_icon"></use></svg>
        <a href="#" class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">Living Room</a>
      </div>
      <div class="relative rounded-sm overflow-hidden group">
        <svg t="1695201162092" class="icon w-full" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="8260" width="200" height="200"><path d="M425.1 551.9c-3.6 0-7-1.7-9.1-4.7-14.6-20.7-28.8-33.7-42.5-46.2l-0.1-0.1c-20.6-18.9-40.1-36.8-61.5-83.5-21.3-46.5-22.6-73.8-23.9-102.6V180.3c0-3.1 1.3-6.1 3.6-8.2 2.3-2.1 5.5-3.2 8.5-2.9 76.4 6.5 136.2 74.7 136.2 155.2v216.5c0 4.9-3.2 9.2-7.8 10.7-1.1 0.1-2.2 0.3-3.4 0.3zM310.4 193v121.2c1.3 27.2 2.4 51.2 21.9 93.8 19.5 42.6 36.5 58.2 56.3 76.3 0 0 0.1 0 0.1 0.1l0.1 0.1c7.9 7.2 16.4 15 25.2 24.6V324.2c-0.1-64.6-44.6-119.9-103.6-131.2zM418.3 870.6c-1.7 0-3.5-0.4-5.1-1.2-34.5-17.7-64.3-44.6-86.1-77.9-25.5-39-39-84.7-39-132.1V489.8c0-4.9 3.2-9.2 7.8-10.7 4.7-1.5 9.7 0.2 12.5 4.2 14.6 20.6 28.7 33.6 42.4 46.2l0.1 0.1 0.1 0.1c20.6 18.9 40.1 36.8 61.4 83.5 21.3 46.6 22.6 73.9 23.9 102.8v133.9c0 1.2-0.2 2.3-0.5 3.3-0.4 1.3-0.9 2.6-1.7 4.1-1.4 2.7-3.3 5.4-5.4 7.6-1.4 1.6-2.7 2.7-3.8 3.5-1.9 1.5-4.3 2.2-6.6 2.2zM310.4 521.4v138c0 43.1 12.2 84.5 35.4 119.8 17.7 27 41.1 49.3 68.1 65.1V716.4c-1.3-27.3-2.4-51.3-21.9-94-19.4-42.5-36.5-58.1-56.2-76.2-8-7.4-16.6-15.2-25.4-24.8zM603.1 870.6c-2.4 0-4.7-0.8-6.7-2.2-1.1-0.8-2.4-1.9-3.9-3.6-2-2.2-4-4.9-5.3-7.6-0.7-1.4-1.3-2.8-1.7-4.2-0.3-1-0.5-2.1-0.5-3.3V716.4c1.4-29.4 2.6-56.7 23.9-103.3 21.4-46.7 40.9-64.6 61.5-83.5 14-12.8 28-25.8 42.5-46.3 2.8-4 7.9-5.7 12.5-4.2 4.7 1.5 7.8 5.8 7.8 10.7v169.6c0 47.5-13.5 93.1-39.1 132.1-21.8 33.3-51.6 60.3-86.1 77.9-1.4 0.8-3.1 1.2-4.9 1.2z m107.8-349.2c-8.8 9.6-17.3 17.4-25.2 24.6l-0.1 0.1c-19.7 18.1-36.8 33.7-56.3 76.3-19.5 42.7-20.6 66.7-21.9 94.5v127.4c27.1-15.8 50.5-38.1 68.1-65.1 23.2-35.3 35.4-76.8 35.4-119.8v-138zM596.2 551.9c-1.1 0-2.3-0.2-3.4-0.5-4.6-1.5-7.8-5.8-7.8-10.7V324.2c0-80.5 59.8-148.7 136.2-155.2 3.2-0.3 6.2 0.8 8.5 2.9 2.3 2.1 3.6 5.1 3.6 8.2v134c-1.3 29.3-2.6 56.5-23.9 103.1-21.3 46.6-40.8 64.5-61.4 83.4-13.9 12.7-28 25.7-42.6 46.4-2.2 3.2-5.6 4.9-9.2 4.9zM710.9 193c-58.9 11.3-103.5 66.6-103.5 131.2v184.9c8.8-9.6 17.3-17.4 25.2-24.6 19.9-18.3 36.9-33.9 56.4-76.4 19.5-42.7 20.6-66.6 21.9-94.3V193z" p-id="8261"></path></svg>
        <a href="#" class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">Kitchen</a>
      </div>
  </div>
  </div>
  <!-- ./categories -->
  <!-- product -->
    <div class="container pb-16 ">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">recomended for you</h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 products-container">
                  <!-- products
            <div class="bg-white shadow rounded overflow-hidden group">
                <div class="relative">
                    <img src="assets/images/products/product1.jpg" alt="product 1" class="w-full">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center
                    justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                        <a href="#"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="view product">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                        <a href="#"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="add to wishlist">
                            <i class="fa-solid fa-heart"></i>
                        </a>
                    </div>
                </div>
                <div class="pt-4 pb-3 px-4">
                    <a href="#">
                        <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">Guyer
                            Chair</h4>
                    </a>
                    <div class="flex items-baseline mb-1 space-x-2">
                        <p class="text-xl text-primary font-semibold">$45.00</p>
                        <p class="text-sm text-gray-400 line-through">$55.90</p>
                    </div>
                    <div class="flex items-center">
                        <div class="flex gap-1 text-sm text-yellow-400">
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                        </div>
                        <div class="text-xs text-gray-500 ml-3">(150)</div>
                    </div>
                </div>
                <a href="#"
                    class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                    to cart</a>
            </div>
                    products -->
        </div>

    </div>
    <!-- ./product -->

  <?php require_once "./Templates/footer.php" ?>
  <div></div>
  <script src="../Backend/js/UserHome.js"></script>
</body>
</html>
