'use client'

import { useState, useEffect } from 'react'
import { useRouter } from 'next/navigation'

import { api } from '@/lib/api'
import { saveAuth, isAuthenticated } from '@/lib/auth'
import { AuthResponse } from '@/types'
import { useLogin } from '@/hooks/use-login'

import {
  Card,
  CardContent,
  CardHeader,
  CardTitle,
} from '@/components/ui/card'

import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import { Button } from '@/components/ui/button'

import {
  Alert,
  AlertDescription,
} from '@/components/ui/alert'

import {
  AlertCircle,
  Loader2,
  Wallet,
} from 'lucide-react'

interface FormState {
  email: string
  password: string
}

interface FormErrors {
  email?: string
  password?: string
}

function validate(form: FormState): FormErrors {
  const errors: FormErrors = {}

  if (!form.email) {
    errors.email = 'El email es requerido'
  } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(form.email)) {
    errors.email = 'Ingresa un email válido'
  }

  if (!form.password) {
    errors.password = 'La contraseña es requerida'
  } else if (form.password.length < 6) {
    errors.password = 'Mínimo 6 caracteres'
  }

  return errors
}

export default function LoginPage() {
  const router = useRouter()

  const [form, setForm] = useState<FormState>({
    email: '',
    password: '',
  })

  const [errors, setErrors] = useState<FormErrors>({})
  const [apiError, setApiError] = useState('')
  const loginMutation = useLogin()

  const [touched, setTouched] = useState<
    Record<string, boolean>
  >({})

  useEffect(() => {
    if (isAuthenticated()) {
      router.replace('/dashboard')
    }
  }, [router])

  function handleChange(
    e: React.ChangeEvent<HTMLInputElement>
  ) {
    const { name, value } = e.target

    setForm((prev) => ({
      ...prev,
      [name]: value,
    }))

    setApiError('')

    if (touched[name]) {
      setErrors(
        validate({
          ...form,
          [name]: value,
        })
      )
    }
  }

  function handleBlur(
    e: React.FocusEvent<HTMLInputElement>
  ) {
    const { name } = e.target

    setTouched((prev) => ({
      ...prev,
      [name]: true,
    }))

    setErrors(validate(form))
  }

  async function handleSubmit(
  e: React.FormEvent
) {
  e.preventDefault()

  setTouched({
    email: true,
    password: true,
  })

  const errs = validate(form)

  setErrors(errs)

  if (Object.keys(errs).length > 0) {
    return
  }

  setApiError('')

  try {
    const data =
      await loginMutation.mutateAsync({
        email: form.email,
        password: form.password,
      })

    saveAuth(
      data.token,
      data.user
    )

    router.replace('/dashboard')
  } catch (err) {
    const msg =
      err instanceof Error
        ? err.message
        : 'Error al iniciar sesión'

    setApiError(
      msg.toLowerCase().includes('401')
        ? 'Email o contraseña incorrectos'
        : msg
    )
  }
}

  return (
    <main className="flex min-h-screen items-center justify-center bg-muted/40 px-4">
      <div className="w-full max-w-sm">
        <div className="mb-8 text-center">
          <div className="mb-4 inline-flex h-12 w-12 items-center justify-center rounded-xl bg-primary">
            <Wallet className="h-6 w-6 text-primary-foreground" />
          </div>

          <h1 className="text-2xl font-bold">
            FinPanel
          </h1>

          <p className="mt-1 text-sm text-muted-foreground">
            Portal de órdenes y pagos
          </p>
        </div>
        <Card>
          <CardHeader>
            <CardTitle>
              Iniciar sesión
            </CardTitle>
          </CardHeader>
          <CardContent>
            <form
              onSubmit={handleSubmit}
              noValidate
              className="space-y-4"
            >
              {apiError && (
                <Alert variant="destructive">
                  <AlertCircle className="h-4 w-4" />

                  <AlertDescription>
                    {apiError}
                  </AlertDescription>
                </Alert>
              )}
              <div className="space-y-2">
                <Label htmlFor="email">
                  Email
                </Label>
                <Input
                  id="email"
                  name="email"
                  type="email"
                  autoComplete="email"
                  placeholder="admin@test.com"
                  value={form.email}
                  onChange={handleChange}
                  onBlur={handleBlur}
                  disabled={loginMutation.isPending}
                />
                {errors.email && (
                  <p className="text-sm text-destructive">
                    {errors.email}
                  </p>
                )}
              </div>
              <div className="space-y-2">
                <Label htmlFor="password">
                  Contraseña
                </Label>
                <Input
                  id="password"
                  name="password"
                  type="password"
                  autoComplete="current-password"
                  placeholder="••••••"
                  value={form.password}
                  onChange={handleChange}
                  onBlur={handleBlur}
                  disabled={loginMutation.isPending}
                />
                {errors.password && (
                  <p className="text-sm text-destructive">
                    {errors.password}
                  </p>
                )}
              </div>
              <Button
                type="submit"
                disabled={loginMutation.isPending}
                className="w-full"
              >
                {loginMutation.isPending ? (
                  <>
                    <Loader2 className="mr-2 h-4 w-4 animate-spin" />
                    Iniciando sesión...
                  </>
                ) : (
                  'Iniciar sesión'
                )}
              </Button>
            </form>
          </CardContent>
        </Card>
        <p className="mt-6 text-center text-xs text-muted-foreground">
          FinPanel · Solo para uso interno
        </p>
      </div>
    </main>
  )
}