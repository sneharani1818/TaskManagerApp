function loadTasks() {
    fetch('fetch_tasks.php')
        .then(response => response.json())
        .then(data => {
            let tasksContainer = document.getElementById('tasks');
            tasksContainer.innerHTML = '';
            data.forEach(task => {
                tasksContainer.innerHTML += `
                    <div class="task">
                        <h3>${task.task_name}</h3>
                        <p>${task.task_description}</p>
                        <p>Status: ${task.task_status}</p>
                        <button onclick="editTask(${task.id})">Edit</button>
                        <button onclick="deleteTask(${task.id})">Delete</button>
                    </div>
                `;
            });
        });
}

function addTask(event) {
    event.preventDefault();
    const formData = new FormData(event.target);
    fetch('add_task.php', {
        method: 'POST',
        body: formData
    }).then(response => response.text())
      .then(data => {
          alert(data);
          loadTasks();
          event.target.reset();
      });
}

function editTask(id) {
    // Fetch task details and fill the form for editing
    fetch(`get_task.php?id=${id}`)
        .then(response => response.json())
        .then(task => {
            document.getElementById('task_id').value = task.id;
            document.getElementById('task_name').value = task.task_name;
            document.getElementById('task_description').value = task.task_description;
            document.getElementById('task_status').value = task.task_status;
        });
}

function updateTask(event) {
    event.preventDefault();
    const formData = new FormData(event.target);
    fetch('update_task.php', {
        method: 'POST',
        body: formData
    }).then(response => response.text())
      .then(data => {
          alert(data);
          loadTasks();
          event.target.reset();
      });
}

function deleteTask(id) {
    fetch(`delete_task.php?id=${id}`, { method: 'GET' })
        .then(response => response.text())
        .then(data => {
            alert(data);
            loadTasks();
        });
}

document.addEventListener('DOMContentLoaded', loadTasks);