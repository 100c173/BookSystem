document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("task-form");
    const taskInput = document.getElementById("task-input");
    const taskList = document.getElementById("task-list");
  
    // إضافة مهمة جديدة
    form.addEventListener("submit", (e) => {
      e.preventDefault();
      const taskText = taskInput.value.trim();
      if (taskText === "") return;
  
      const li = document.createElement("li");
      li.className = "list-group-item d-flex justify-content-between align-items-center";
  
      const span = document.createElement("span");
      span.textContent = taskText;
      span.classList.add("task-text");
      span.style.cursor = "pointer";
  
      // عند النقر: شطب/إلغاء الشطب
      span.addEventListener("click", () => {
        span.classList.toggle("text-decoration-line-through");
        span.classList.toggle("text-muted");
      });
  
      const deleteBtn = document.createElement("button");
      deleteBtn.className = "btn btn-sm btn-danger";
      deleteBtn.innerHTML = '<i class="bi bi-x-lg"></i>';
      deleteBtn.addEventListener("click", () => li.remove());
  
      li.appendChild(span);
      li.appendChild(deleteBtn);
      taskList.appendChild(li);
  
      taskInput.value = "";
    });
  });
  