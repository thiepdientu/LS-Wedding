# Architecture Decision Tree

Is this conventional CRUD?
- Yes → resource controller + Form Request + Eloquent + Policy where needed.
- No → identify the business workflow and its boundary.

Does the workflow span multiple models/steps?
- Yes → consider an Action/Service and transaction.
- No → keep logic close to the simplest appropriate layer.

Is the work slow/retryable?
- Yes → consider a queued Job.
- No → keep it synchronous.

Do multiple independent consumers react to an event?
- Yes → consider Event/Listener.
- No → direct orchestration may be simpler.
