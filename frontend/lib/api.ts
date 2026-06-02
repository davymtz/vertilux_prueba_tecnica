import { OrdersParams } from '@/types'
import { getToken, clearAuth } from './auth'

const BASE_URL = (
  process.env.NEXT_PUBLIC_API_URL ?? 'http://localhost/api'
).replace(/\/$/, '')

type HttpMethod = 'GET' | 'POST'// | 'PUT' | 'PATCH' | 'DELETE'

async function request<T>(
  method: HttpMethod,
  path: string,
  body?: unknown,
  params?: Record<string, string | number | boolean | OrdersParams | undefined>
): Promise<T> {
  const token = getToken()

  const url = new URL(`${BASE_URL}${path}`)
  if (params) {
    Object.entries(params).forEach(([k, v]) => {
      if (v === undefined || v === null) return
      if (typeof v === 'object') {
        url.searchParams.set(
          k,
          JSON.stringify(v)
        )
        return
      }
      url.searchParams.set(k, String(v))
    })
  }

  const headers: HeadersInit = {
    Accept: 'application/json',
    ...(token
      ? {
        Authorization: `Bearer ${token}`
      }
      : {}
    ),
  }

  if (body !== undefined) {
    headers['Content-Type'] =
      'application/json'
  }

  const res = await fetch(url.toString(), {
    method,
    headers,
    body: body !== undefined ? JSON.stringify(body) : undefined,
  })

  if (res.status === 401) {
    clearAuth()

    if (typeof window !== 'undefined') {
      window.location.href = '/login'
    }
    throw new Error('Sesión expirada')
  }

  if (!res.ok) {
    const err = await res.json().catch(() => ({ message: 'Error desconocido' }))
    throw new Error(err.message ?? `Error ${res.status}`)
  }

  if (res.status === 204 || res.headers.get('content-length') === '0') {
    return undefined as T
  }

  return res.json() as Promise<T>
}

export const api = {
  get: <T>(path: string, params?: Record<string, string | number | boolean | OrdersParams | undefined>) =>
    request<T>('GET', path, undefined, params),

  post: <T>(path: string, body?: unknown) =>
    request<T>('POST', path, body),

  // put: <T>(path: string, body?: unknown) =>
  //   request<T>('PUT', path, body),

  // patch: <T>(path: string, body?: unknown) =>
  //   request<T>('PATCH', path, body),

  // delete: <T>(path: string) =>
  //   request<T>('DELETE', path),
}