<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../dist/output.css" rel="stylesheet">
</head>
<body class="bg-gray-200 min-h-screen flex items-center justify-center">
  <button class="bg-pink-500 text-black active:bg-pink-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
    Open regular modal
  </button>
  <div class="hidden fixed flex items-center justify-center bg-black bg-opacity-50 z-50 " id="modal-id">
    <div class="relative my-6 mx-auto max-w-3xl">
      <!--content-->
      <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
        <!--header-->
        <div class="flex items-start justify-between p-5 border-b border-solid border-slate-200 rounded-t">
          <h1 class="text-2xl font-semibold mb-4">User Roles and Permissions</h1>
          <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-id')">
            <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
              ×
            </span>
          </button>
        </div>
        <!--body-->
        <div class="p-4 w-96">
          <!-- Admin Role -->
          <div class="mb-8">
            <h2 class="text-lg font-semibold mb-2">Admin Role</h2>
            <ul class="list-disc pl-6">
              <li class="text-gray-700">Manage Users</li>
              <li class="text-gray-700">Access Settings</li>
              <li class="text-gray-700">Edit Content</li>
            </ul>
          </div>

          <!-- Editor Role -->
          <div class="mb-8">
            <h2 class="text-lg font-semibold mb-2">Editor Role</h2>
            <ul class="list-disc pl-6">
              <li class="text-gray-700">Edit Content</li>
              <li class="text-gray-700">Publish Articles</li>
            </ul>
          </div>

          <!-- User Role -->
          <div class="mb-8">
            <h2 class="text-lg font-semibold mb-2">User Role</h2>
            <ul class="list-disc pl-6">
              <li class="text-gray-700">View Content</li>
              <li class="text-gray-700">Comment on Posts</li>
            </ul>
          </div>
        </div>

        <!--footer-->
        <div class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b">
          <button class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
            Close
          </button>
          <button class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
            Save Changes
          </button>
        </div>
      </div>
    </div>
  </div>
  <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
  <script type="text/javascript">
    function toggleModal(modalID) {
      document.getElementById(modalID).classList.toggle("hidden");
      document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
      document.getElementById(modalID).classList.toggle("flex");
      document.getElementById(modalID + "-backdrop").classList.toggle("flex");
    }
  </script>
</body>
</html>
