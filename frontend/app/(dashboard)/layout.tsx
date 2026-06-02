'use client'

import { useEffect, useState } from 'react'
import { User } from '@/types'
import Link from 'next/link'
import { useRouter, usePathname } from 'next/navigation'

import AuthGuard from '@/components/auth-guard'

import {
  Avatar,
  AvatarFallback,
} from '@/components/ui/avatar'

import { Button } from '@/components/ui/button'

import {
  Sheet,
  SheetContent,
} from '@/components/ui/sheet'

import { Separator } from '@/components/ui/separator'

import {
  Home,
  ClipboardList,
  LogOut,
  Menu,
  Wallet,
  Sun,
  Moon,
} from 'lucide-react'

import {
  getUser,
} from '@/lib/auth'
import { useLogout } from '@/hooks/use-logout'
import { useTheme } from 'next-themes'

const NAV = [
  {
    href: '/dashboard',
    label: 'Dashboard',
    icon: Home,
  }
]

export default function DashboardLayout({
  children,
}: {
  children: React.ReactNode
}) {
  const router = useRouter()
  const pathname = usePathname()
  const logoutMutation = useLogout()
  const [sidebarOpen, setSidebarOpen] = useState(false)
  const [user, setUser] = useState<User | null>(null)

  const { theme, setTheme } = useTheme()

  useEffect(() => {
    setUser(getUser())
  }, [])

  if (!user) {
    return null
  }

  const initials = user.name
    .split(' ')
    .map((name: string) => name[0])
    .slice(0, 2)
    .join('')
    .toUpperCase()

  const SidebarContent = () => (
    <>
      <div className="flex h-14 items-center gap-3 px-4">
        <Wallet className="h-5 w-5" />
        <span className="font-semibold">
          FinPanel
        </span>
      </div>

      <Separator />

      <nav className="flex-1 p-3 space-y-1">
        {NAV.map((item) => {
          const active =
            pathname === item.href

          const Icon = item.icon

          return (
            <Link
              key={item.href}
              href={item.href}
              onClick={() =>
                setSidebarOpen(false)
              }
            >
              <Button
                variant={
                  active
                    ? 'secondary'
                    : 'ghost'
                }
                className="w-full justify-start"
              >
                <Icon className="mr-2 h-4 w-4" />
                {item.label}
              </Button>
            </Link>
          )
        })}
      </nav>

      <Separator />

      <div className="p-3 space-y-3">
        <Button
          variant="ghost"
          className="w-full justify-start"
          onClick={() =>
            setTheme(theme === 'dark' ? 'light' : 'dark')
          }
        >
          {theme === 'dark' ? (
            <Sun className="mr-2 h-4 w-4" />
          ) : (
            <Moon className="mr-2 h-4 w-4" />
          )}

          Cambiar tema
        </Button>
        <div className="flex items-center gap-3">
          <Avatar>
            <AvatarFallback>
              {initials}
            </AvatarFallback>
          </Avatar>

          <div className="min-w-0">
            <p className="truncate text-sm font-medium">
              {user.name}
            </p>

            <p className="truncate text-xs text-muted-foreground">
              {user.email}
            </p>
          </div>
        </div>

        <Button
          variant="ghost"
          className="w-full justify-start"
          onClick={() => logoutMutation.mutate()}
        >
          <LogOut className="mr-2 h-4 w-4" />
          Cerrar sesión
        </Button>
      </div>
    </>
  )

  return (
    <AuthGuard>
      <div className="flex min-h-screen bg-muted/40">
        <aside className="hidden w-64 border-r bg-background lg:flex lg:flex-col">
          <SidebarContent />
        </aside>

        <Sheet
          open={sidebarOpen}
          onOpenChange={setSidebarOpen}
        >
          <SheetContent
            side="left"
            className="p-0 w-64"
          >
            <div className="flex h-full flex-col">
              <SidebarContent />
            </div>
          </SheetContent>
        </Sheet>

        <div className="flex flex-1 flex-col">
          <header className="flex h-14 items-center border-b bg-background px-4 lg:hidden">
            <Button
              variant="ghost"
              size="icon"
              onClick={() =>
                setSidebarOpen(true)
              }
            >
              <Menu className="h-5 w-5" />
            </Button>

            <span className="ml-3 font-semibold">
              FinPanel
            </span>
          </header>

          <main className="flex-1 p-6">
            {children}
          </main>
        </div>
      </div>
    </AuthGuard>
  )
}