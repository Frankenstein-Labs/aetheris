import { useParams } from '@tanstack/react-router'
import {
  getSitesServiceTabs,
  ProductComputeUsageView,
} from '../shared/ProductComputeUsageView'

export function View() {
  const { projectId } = useParams({ strict: false })

  if (!projectId) return null

  return (
    <ProductComputeUsageView
      projectId={projectId}
      title="Sites"
      tabs={getSitesServiceTabs(projectId)}
      activeTab="usage"
      scope="sites"
    />
  )
}
