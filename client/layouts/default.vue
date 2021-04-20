<template>
  <div>
    <Nav />
    <Nuxt />
  </div>
</template>

<style>
  h1, h3 {
    text-align: center;
    margin-top: 2rem;
  }
  p {
    text-align: center;
    max-width: 400px;
    margin: auto;
  }
  .alert {
    text-align: center;
    max-width: 300px;
    margin: auto;
    margin-top: 3rem;
  }
  body {
    background-color: #446392;
    font-family: Arial, Helvetica, sans-serif
  }
  body::after {
    content: "";
    background: #4D72A9;
    height: 50vw;
    width: 50vw;
    border-radius: 50%;
    position: fixed;
    left: 50%;
    top: 50%;
    transform: translate3d(-50%, -50%, 0);
    z-index: -1;
  }
  a {
    color: #333;
    text-decoration: underline;
  }
  a:hover {
    color: #555;
  }
</style>
