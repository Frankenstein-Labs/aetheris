import { createFileRoute } from '@tanstack/react-router'
import { View } from '@/components/pages/projects/$projectId/sites/usage/View'
import { fetchProject } from '@/lib/react-query/hooks'
import { pageTitle } from '@/lib/utils/page-title'

export const Route = createFileRoute(
  '/_public/projects/$projectId/sites/usage',
)({
  head: () => ({ meta: [{ title: pageTitle('Usage', 'Sites') }] }),
  loader: async ({ params, context }) => {
    if (typeof window === 'undefined') {
      return
    }

    const { projectId } = params
    const { queryClient } = context

    if (projectId) {
      await queryClient.ensureQueryData({
        queryKey: ['project', projectId],
        queryFn: () => fetchProject(projectId),
        staleTime: 5 * 60 * 1000,
      })
    }
  },
  component: SitesUsagePage,
})

function SitesUsagePage() {
  const { projectId } = Route.useParams()
  return <View key={`sites-usage-${projectId}`} />
}
