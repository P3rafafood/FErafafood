import type { UseFetchOptions } from 'nuxt/app'

export function useApiFetch<T> (path: string | (() => string), options: UseFetchOptions<T> = {}) {
  let headers: any = {}
  useFetch('http://103.168.147.245/sanctum/csrf-cookie')
  const token = useCookie('XSRF-TOKEN')

  if (token.value) {
    headers['X-XSRF-TOKEN'] = token.value as string
  }

  // if (process.server) {
  //   headers = {
  //     ...headers,
  //     ...useRequestHeaders(["referer", "cookie"])
  //   }
  // }

  return useFetch("http://103.168.147.245/api" + path, {
    credentials: 'include',
    watch: false,
    ...options,
    headers: {
      ...headers,
      ...options?.headers
    }
  })
}