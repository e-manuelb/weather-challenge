import type {Pagination} from "@/interfaces/Pagination";
import type {User} from "@/interfaces/User";

export interface ListUsersResponse extends Pagination {
    data: Array<User>;
}
