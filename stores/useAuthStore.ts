import { defineStore } from 'pinia'
import { useApiFetch } from '~/composables/useApiFetch'

type User = {
  id: string,
  name: string,
  email: string
}

type Credentials = {
  email: string,
  password: string
}

export const useAuthStore = defineStore('auth', () => {
  const user = ref<User | null>(null)
  const token = ref(null)
  const isLoggedIn = computed(() => !!user.value)

  async function login(credentials: Credentials) {
    const { data:res, error } = await useApiFetch('/auth/login', {
      method: 'POST',
      body: credentials
    })

    const myCookieToken = useCookie('token', { maxAge: 60 * 60 * 24 * 7 })
    myCookieToken.value = res.value.token

    await fetchUser()

    return error
  }

  async function fetchUser() {
    // const { data:res } = await useApiFetch('/admin/user', {
    //   headers: {
    //     'Authorization' : 'Bearer '+token.value
    //   }
    // })
    
    // user.value = res.value.user as User
  }

  return { user, token, login, isLoggedIn, fetchUser }
})