<nav class="flex items-center justify-between flex-wrap bg-orange-700 sticky top-0 p-6">
  <div class="flex items-center flex-shrink-0 text-white mr-6">
    <span class="font-semibold text-xl tracking-tight"><?php echo bloginfo('name') ?></span>
  </div>
  <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
    <div>
      <button class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-orange-700 hover:bg-white mt-4 lg:mt-0" :class="enableOrder()" @click="hideOrder = false">
        Artículos en su carrito: {{orderArray.length}}
      </button>
    </div>
  </div>
</nav>