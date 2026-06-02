import { useMutation } from '@tanstack/react-query'
import { useRouter } from 'next/navigation'

import { authService } from '@/services/auth.service'
import { clearAuth } from '@/lib/auth'

export function useLogout() {
  const router = useRouter()

  return useMutation({
    mutationFn: () => authService.logout(),

    onSettled: () => {
      clearAuth()
      router.replace('/login')
    },
  })
}