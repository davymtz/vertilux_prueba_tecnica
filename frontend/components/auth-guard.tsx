'use client'

import { useEffect, useState } from 'react'
import { useRouter } from 'next/navigation'
import { isAuthenticated } from '@/lib/auth'

export default function AuthGuard({ children }: { children: React.ReactNode }) {
  const router = useRouter()

  const [checking, setChecking] = useState(true)

  useEffect(() => {
    const auth = isAuthenticated()

    if (!auth) {
      router.replace('/login')
      return
    }

    setChecking(false)
  }, [router])

  if (checking) {
    return (
      <div className="h-screen flex items-center justify-center">
        Loading...
      </div>
    )
  }

  return children
}