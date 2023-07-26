import type {UserWeather} from "@/interfaces/UserWeather";

export interface User {
    id?: string;
    name?: string;
    email?: string;
    longitude?: string;
    latitude?: string;
    weather: UserWeather;
    created_at?: Date;
    update_at?: Date;
}
