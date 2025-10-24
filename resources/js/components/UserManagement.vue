<template>
  <div class="space-y-6">
    <!-- Header with Add Button -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
      <div>
        <h2 class="text-2xl font-bold text-gray-800">User Management</h2>
        <p class="text-gray-600 mt-1">Manage system users and their roles</p>
      </div>
      <button
        @click="openModal()"
        class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-pink-500 to-purple-500 text-white font-semibold rounded-lg hover:shadow-lg transition transform hover:scale-105"
      >
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
        </svg>
        Add New User
      </button>
    </div>

    <!-- Alert Messages -->
    <div v-if="alert.show" :class="alertClass" class="px-4 py-3 rounded-lg flex items-center justify-between animate-fade-in">
      <div class="flex items-center">
        <svg v-if="alert.type === 'success'" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
        </svg>
        <svg v-else class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
        </svg>
        <span>{{ alert.message }}</span>
      </div>
      <button @click="alert.show = false" :class="alert.type === 'success' ? 'text-green-600 hover:text-green-800' : 'text-red-600 hover:text-red-800'">
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
      </button>
    </div>

    <!-- Loading State -->
    <div v-if="loading" class="bg-white rounded-xl shadow-sm p-12 text-center">
      <div class="inline-block animate-spin rounded-full h-12 w-12 border-4 border-pink-500 border-t-transparent"></div>
      <p class="mt-4 text-gray-600">Loading users...</p>
    </div>

    <!-- Users Table -->
    <div v-else class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">User</th>
              <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email</th>
              <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Role</th>
              <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Created At</th>
              <th class="px-6 py-4 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr v-if="users.length === 0">
              <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <p class="mt-4 text-lg font-medium">No users found</p>
                <p class="mt-1 text-sm">Get started by creating a new user.</p>
              </td>
            </tr>
            <tr v-for="user in users" :key="user.id" class="hover:bg-gray-50 transition">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gradient-to-br from-pink-400 to-purple-500 flex items-center justify-center text-white font-bold">
                    {{ user.name.charAt(0).toUpperCase() }}
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">{{ user.name }}</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ user.email }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span :class="user.role === 'admin' ? 'bg-purple-100 text-purple-800' : 'bg-gray-100 text-gray-800'" class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full">
                  {{ user.role }}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ formatDate(user.created_at) }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <button
                  @click="openModal(user)"
                  class="text-blue-600 hover:text-blue-900 mr-4 transition"
                  title="Edit"
                >
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                  </svg>
                </button>
                <button
                  @click="confirmDelete(user)"
                  class="text-red-600 hover:text-red-900 transition"
                  title="Delete"
                >
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                  </svg>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Create/Edit Modal -->
    <div v-if="modal.show" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
      <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Background overlay -->
        <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" @click="closeModal"></div>

        <!-- Modal panel -->
        <div class="inline-block align-bottom bg-white rounded-xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
          <form @submit.prevent="saveUser">
            <div class="bg-white px-6 pt-6 pb-4">
              <div class="flex items-center justify-between mb-4">
                <h3 class="text-2xl font-bold text-gray-900">
                  {{ modal.isEdit ? 'Edit User' : 'Add New User' }}
                </h3>
                <button type="button" @click="closeModal" class="text-gray-400 hover:text-gray-600 transition">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </div>

              <div class="space-y-4">
                <!-- Name -->
                <div>
                  <label class="block text-sm font-semibold text-gray-700 mb-2">Name</label>
                  <input
                    v-model="form.name"
                    type="text"
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent transition"
                    :class="{'border-red-500': errors.name}"
                    placeholder="John Doe"
                  />
                  <p v-if="errors.name" class="mt-1 text-sm text-red-600">{{ errors.name[0] }}</p>
                </div>

                <!-- Email -->
                <div>
                  <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                  <input
                    v-model="form.email"
                    type="email"
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent transition"
                    :class="{'border-red-500': errors.email}"
                    placeholder="john@example.com"
                  />
                  <p v-if="errors.email" class="mt-1 text-sm text-red-600">{{ errors.email[0] }}</p>
                </div>

                <!-- Password -->
                <div>
                  <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Password {{ modal.isEdit ? '(leave blank to keep current)' : '' }}
                  </label>
                  <input
                    v-model="form.password"
                    type="password"
                    :required="!modal.isEdit"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent transition"
                    :class="{'border-red-500': errors.password}"
                    placeholder="••••••••"
                  />
                  <p v-if="errors.password" class="mt-1 text-sm text-red-600">{{ errors.password[0] }}</p>
                </div>

                <!-- Role -->
                <div>
                  <label class="block text-sm font-semibold text-gray-700 mb-2">Role</label>
                  <select
                    v-model="form.role"
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent transition"
                    :class="{'border-red-500': errors.role}"
                  >
                    <option value="">Select a role</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                  </select>
                  <p v-if="errors.role" class="mt-1 text-sm text-red-600">{{ errors.role[0] }}</p>
                </div>
              </div>
            </div>

            <div class="bg-gray-50 px-6 py-4 flex flex-col-reverse sm:flex-row sm:justify-end gap-3">
              <button
                type="button"
                @click="closeModal"
                class="w-full sm:w-auto px-6 py-2 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-100 transition"
              >
                Cancel
              </button>
              <button
                type="submit"
                :disabled="saving"
                class="w-full sm:w-auto px-6 py-2 bg-gradient-to-r from-pink-500 to-purple-500 text-white font-semibold rounded-lg hover:shadow-lg transition disabled:opacity-50 disabled:cursor-not-allowed"
              >
                <span v-if="!saving">{{ modal.isEdit ? 'Update User' : 'Create User' }}</span>
                <span v-else class="flex items-center justify-center">
                  <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                  </svg>
                  Saving...
                </span>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div v-if="deleteModal.show" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
      <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Background overlay -->
        <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" @click="deleteModal.show = false"></div>

        <!-- Modal panel -->
        <div class="inline-block align-bottom bg-white rounded-xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-md sm:w-full">
          <div class="bg-white px-6 pt-6 pb-4">
            <div class="flex items-start">
              <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
              </div>
              <div class="ml-4 mt-0">
                <h3 class="text-lg font-bold text-gray-900">Delete User</h3>
                <p class="mt-2 text-sm text-gray-600">
                  Are you sure you want to delete <strong>{{ deleteModal.user?.name }}</strong>? This action cannot be undone.
                </p>
              </div>
            </div>
          </div>

          <div class="bg-gray-50 px-6 py-4 flex flex-col-reverse sm:flex-row sm:justify-end gap-3">
            <button
              type="button"
              @click="deleteModal.show = false"
              class="w-full sm:w-auto px-6 py-2 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-100 transition"
            >
              Cancel
            </button>
            <button
              @click="deleteUser"
              :disabled="deleting"
              class="w-full sm:w-auto px-6 py-2 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition disabled:opacity-50 disabled:cursor-not-allowed"
            >
              <span v-if="!deleting">Delete User</span>
              <span v-else class="flex items-center justify-center">
                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Deleting...
              </span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'UserManagement',
  data() {
    return {
      users: [],
      loading: true,
      saving: false,
      deleting: false,
      modal: {
        show: false,
        isEdit: false,
      },
      form: {
        id: null,
        name: '',
        email: '',
        password: '',
        role: 'user',
      },
      errors: {},
      alert: {
        show: false,
        type: 'success',
        message: '',
      },
      deleteModal: {
        show: false,
        user: null,
      },
    };
  },
  computed: {
    alertClass() {
      return this.alert.type === 'success'
        ? 'bg-green-50 border border-green-200 text-green-800'
        : 'bg-red-50 border border-red-200 text-red-800';
    },
  },
  mounted() {
    this.fetchUsers();
  },
  methods: {
    async fetchUsers() {
      this.loading = true;
      try {
        const response = await fetch('/api/users');
        this.users = await response.json();
      } catch (error) {
        this.showAlert('error', 'Failed to load users. Please try again.');
        console.error('Error fetching users:', error);
      } finally {
        this.loading = false;
      }
    },
    
    openModal(user = null) {
      this.modal.show = true;
      this.modal.isEdit = !!user;
      this.errors = {};
      
      if (user) {
        this.form = {
          id: user.id,
          name: user.name,
          email: user.email,
          password: '',
          role: user.role,
        };
      } else {
        this.form = {
          id: null,
          name: '',
          email: '',
          password: '',
          role: 'user',
        };
      }
    },
    
    closeModal() {
      this.modal.show = false;
      this.form = {
        id: null,
        name: '',
        email: '',
        password: '',
        role: 'user',
      };
      this.errors = {};
    },
    
    async saveUser() {
      this.saving = true;
      this.errors = {};
      
      try {
        const url = this.modal.isEdit ? `/users/${this.form.id}` : '/users';
        const method = this.modal.isEdit ? 'PUT' : 'POST';
        
        const formData = {
          name: this.form.name,
          email: this.form.email,
          role: this.form.role,
        };
        
        if (this.form.password || !this.modal.isEdit) {
          formData.password = this.form.password;
        }
        
        const response = await fetch(url, {
          method: method,
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json',
          },
          body: JSON.stringify(formData),
        });
        
        const data = await response.json();
        
        if (!response.ok) {
          if (data.errors) {
            this.errors = data.errors;
          } else {
            throw new Error(data.message || 'Failed to save user');
          }
          return;
        }
        
        this.showAlert('success', data.message || (this.modal.isEdit ? 'User updated successfully!' : 'User created successfully!'));
        this.closeModal();
        await this.fetchUsers();
      } catch (error) {
        this.showAlert('error', error.message || 'Failed to save user. Please try again.');
        console.error('Error saving user:', error);
      } finally {
        this.saving = false;
      }
    },
    
    confirmDelete(user) {
      this.deleteModal.show = true;
      this.deleteModal.user = user;
    },
    
    async deleteUser() {
      this.deleting = true;
      
      try {
        const response = await fetch(`/users/${this.deleteModal.user.id}`, {
          method: 'DELETE',
          headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json',
          },
        });
        
        const data = await response.json();
        
        if (!response.ok) {
          throw new Error(data.message || 'Failed to delete user');
        }
        
        this.showAlert('success', data.message || 'User deleted successfully!');
        this.deleteModal.show = false;
        this.deleteModal.user = null;
        await this.fetchUsers();
      } catch (error) {
        this.showAlert('error', error.message || 'Failed to delete user. Please try again.');
        console.error('Error deleting user:', error);
      } finally {
        this.deleting = false;
      }
    },
    
    showAlert(type, message) {
      this.alert = {
        show: true,
        type: type,
        message: message,
      };
      
      setTimeout(() => {
        this.alert.show = false;
      }, 5000);
    },
    
    formatDate(dateString) {
      const date = new Date(dateString);
      return new Intl.DateTimeFormat('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
      }).format(date);
    },
  },
};
</script>

<style scoped>
@keyframes fade-in {
  from {
    opacity: 0;
    transform: translateY(-10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.animate-fade-in {
  animation: fade-in 0.3s ease-out;
}
</style>
