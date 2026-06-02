import { api } from '@/lib/api'
import { AuthResponse } from '@/types'

export const authService = {
  login(email: string, password: string) {
    return api.post<AuthResponse>(
      '/auth/login',
      {
        email,
        password,
      }
    )
  },
  logout() {
    return api.post<void>(
      '/auth/logout',
      {}
    )
  },
}